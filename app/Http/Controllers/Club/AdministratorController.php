<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Models\Club\Administrator;
use App\Models\Club\TeamsTeamAdministrator;

use App\Models\User;
use App\Models\Club\Team;
use Illuminate\Http\Request;
use Hash;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 

   
    public function index($id)
    {
        //
        $team_id = $id;
        $administrators = Administrator::where('team_id',$id)->get();
        return view('team.administrator.list',compact('administrators','team_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $id = base64_decode($id);
         return view('team.administrator.create',compact('id'));
    }

    public function add()
    {
        //
        $club_id = session('club_id');
        $teams = Team::where('club_id',$club_id)->get();
        $title = 'Team Administrator';
         return view('team.administrator.add',compact('teams','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // Validate incoming request data
        $validatedData = $request->validate([
            'team_id' => 'required|exists:teams,id', // Assumes there is a 'teams' table
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:50', // Customize as needed (e.g., 'admin', 'super-admin')
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:administrators,email',
            'status' => 'required|in:1,0',
        ]);

        // Create a new administrator record
         $pass = Hash::make($request->password);
        $user = User::create([
                'name' => $request->input('name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'role' => 'administrator',
                'password' => $pass,
                'status' => $request->status,

        ]);
        $validatedData['user_id'] = $user->id;
        $administrator = Administrator::create($validatedData);

        // Redirect or return a response (customize as needed)
        $tId = base64_encode($request->team_id);
        return redirect()->route('team.info',$tId) // Assuming you have a route named 'administrators.index'
            ->with('success', 'Administrator created successfully.');
    }



    public function save(Request $request)
    {
          // Validate incoming request data
        $validatedData = $request->validate([
            'team' => 'required', // Assumes there is a 'teams' table
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:50', // Customize as needed (e.g., 'admin', 'super-admin')
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:users,email',
            'status' => 'required|in:1,0',
        ]);

        // Create a new administrator record
         $pass = Hash::make($request->password);
        $user = User::create([
                'name' => $request->input('name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'role' => 'administrator',
                'password' => $pass,
                'status' => $request->status,

        ]);
        $validatedData['user_id'] = $user->id;
        $administrator = Administrator::create($validatedData);
            
             foreach ($request->team as $team) {
                TeamsTeamAdministrator::create([
                                'user_id' => $user->id,
                                'team_administrator_id' => $administrator->id,
                                'team_id' => $team,
                    ]);
            }
        // Redirect or return a response (customize as needed)
        $tId = base64_encode($request->team_id);
        return redirect()->route('team.team_administrator')->with('success', 'Administrator created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrator $administrator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $id = base64_decode($id);
        $cid =  session('club_id');
        $teams = Team::where('club_id',$cid)->get();
        $administrator = Administrator::where('id',$id)->first();
        $teamsTeamAdministrators = TeamsTeamAdministrator::where('team_administrator_id',$administrator->id)->pluck('team_id');
        $title = "Team Administrator";
        return view('team.administrator.edit',compact('id','teams','administrator','title','teamsTeamAdministrators'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
         $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required', // Adjust based on your type options
            'phone' => 'required|string|max:15', // Adjust validation as needed
            'email' => 'required|email|max:255',
            'status' => 'required|boolean',
        ]);

        // Find the administrator by ID
        $administrator = Administrator::findOrFail($id);

        // Update the administrator's data
        $administrator->name = $request->input('name');
        $administrator->type = $request->input('type');
        $administrator->phone = $request->input('phone');
        $administrator->email = $request->input('email');
        $administrator->status = $request->input('status');

        // Save the changes
        $administrator->save();

        $tId = base64_encode($request->team_id);
        // Redirect back with a success message

        TeamsTeamAdministrator::where('team_administrator_id', $id)->delete();
        foreach ($request->team as $team) {
            TeamsTeamAdministrator::create([
                'user_id' => $administrator->user_id,
                'team_administrator_id' => $administrator->id,
                'team_id' => $team,
            ]);
        }

        $user = User::findOrFail($administrator->user_id);
        $user->name = $request->input('name'); // Toggle status
        $user->last_name = $request->input('last_name'); // Toggle status
        $user->status = $request->input('status'); // Toggle status
        $user->email = $request->input('email'); // Toggle status
        $user->save();
        $route = session('route');
        if($route){
            return redirect()->route($route)->with('success', 'Team administrator updated successfully.');

        }else{
        return redirect()->route('team.info',$tId)->with('success', 'Administrator updated successfully.');
    
     }
    }

      public function updateStatus(Request $request, $id)
    {
        $id = base64_decode($id);
        $administrator = Administrator::findOrFail($id);
        $administrator->status = !$administrator->status; // Toggle status
        $administrator->save();
        $user = User::findOrFail($administrator->user_id);
        $user->status = !$user->status; // Toggle status
        $user->save();

        return back()->with('success', 'Administrator status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $id = base64_decode($id);
        TeamsTeamAdministrator::where('team_administrator_id', $id)->delete();
        $administrators = Administrator::where('id',$id)->delete();
        return back()->with('success', 'Administrator deleted successfully.');
    }
}
