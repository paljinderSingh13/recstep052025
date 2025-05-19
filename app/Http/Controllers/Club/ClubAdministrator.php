<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Club\Team;
use App\Models\Club\Club;
use App\Models\Club\ClubAdministrator as CA;
use App\Models\Club\TeamsTeamAdministrator;
use App\Models\Club\Player;
use App\Models\User;
use App\Models\Club\PlayerMetaTeam;
use App\Models\Club\PlayerMetaAdministrator;
use App\Models\Club\Schedule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Hash;
class ClubAdministrator extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function clubDashboard(){

        $id =  session('club_id');
        session()->put('route','club.dashboard');
       //echo session('club_id');
       //dump($id);
       $club_administrator = CA::where('club_id',$id)->get();
       $teams = Team::withCount('players')->where('club_id',$id)->get();
       // dd($teams);
       $pluck_teams = Team::where('club_id',$id)->pluck('id');
    //    dd($pluck_teams->all());
       
        $players = Player::with(['teamMeta.team','administrator.user'])->where('club_id', $id)->get();

         //dd($players);
       
        $scheduleTournaments = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();

        $scheduleGame = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
        $schedulePractice = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
        $title = "Management";



        if(auth()->user()->role == 'player'){
            $playerMetaTeam = PlayerMetaTeam::where('user_id',auth()->user()->id)->pluck('team_id');
            $teams = Team::withCount('players')->whereIn('id',$playerMetaTeam)->get();
            $pluck_teams = Team::where('club_id',$id)->whereIn('id',$playerMetaTeam)->pluck('id');
            $teamPlayersGet = PlayerMetaTeam::whereIn('team_id',$pluck_teams)->pluck('player_id');
            $players = Player::with(['teamMeta.team','administrator.user'])->whereIn('id',$teamPlayersGet)->get();
            $scheduleTournaments = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();
            $scheduleGame = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
            $schedulePractice = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
            $title = "Player Management";
        }
        if(auth()->user()->role == 'player_administrator'){
            $playerMetaAdministrators = PlayerMetaAdministrator::where('user_id',auth()->user()->id)->first();
            $pUser = Player::where('id',$playerMetaAdministrators['player_id'])->first();
            $playerMetaTeam = PlayerMetaTeam::where('user_id',$pUser['user_id'])->pluck('team_id');
            $teams = Team::withCount('players')->whereIn('id',$playerMetaTeam)->get();
            $pluck_teams = Team::where('club_id',$id)->whereIn('id',$playerMetaTeam)->pluck('id');
            $teamPlayersGet = PlayerMetaTeam::whereIn('team_id',$pluck_teams)->pluck('player_id');
            $players = Player::with(['teamMeta.team','administrator.user'])->whereIn('id',$teamPlayersGet)->get();
            $scheduleTournaments = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();
            $scheduleGame = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
            $schedulePractice = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
            $title = "Player Management";
        }
        if(auth()->user()->role == 'administrator' ){
            $teamsTeamAdministrators = TeamsTeamAdministrator::where('user_id',auth()->user()->id)->pluck('team_id');
            $playerMetaTeam = PlayerMetaTeam::where('user_id',auth()->user()->id)->pluck('team_id');
            $teams = Team::withCount('players')->whereIn('id',$teamsTeamAdministrators)->get();
            $pluck_teams = Team::where('club_id',$id)->whereIn('id',$teamsTeamAdministrators)->pluck('id');
            $teamPlayersGet = PlayerMetaTeam::whereIn('team_id',$pluck_teams)->pluck('player_id');
            $players = Player::with(['teamMeta.team','administrator.user'])->whereIn('id',$teamPlayersGet)->get();
            $scheduleTournaments = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();
            $scheduleGame = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
            $schedulePractice = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
            $title = "Player Management";
        }
        return view('club.dashboard', compact('id','title','teams','club_administrator' , 'players', 'scheduleTournaments', 'scheduleGame','schedulePractice'));
    }


    public function index()
    {
        $id =  session('club_id');
        session()->put('route','club.adm');
        $club_administrator = CA::where('club_id',$id)->get();
        $title = "Club Administrator";
        return view('club.administrator.list', compact('id', 'title', 'club_administrator'));
    }

    public function edit($id)
    {
        //
        $cadmin_id = base64_decode($id);
        $cadmin = CA::where('id',$cadmin_id)->first();
        if($cadmin->user){
            $title = "Edit ".$cadmin->user['name'].' '.$cadmin->user['last_name'];

        }else{
            $title = "Edit Club Administrator";
        }
        return view('club.administrator.edit',compact('cadmin_id','cadmin','title'));
    }

    public function update(Request $request)
    {
        //
        // $id = base64_decode($id);
        // $ca = CA::where('id',$request->id)->first();
        $ca = CA::findOrFail($request->id);
        // dd($request->all());
        
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'phone' => 'required|string|min:10|max:13',
            'email' => 'required|email|max:255|unique:clubs,email',
        ]);

       
        if ($request->hasFile('image')) {
            // Delete the old picture if it exists
            if ($ca->image && file_exists(public_path($ca->image))) {
                unlink(public_path($ca->image));
            }
            // Generate a unique filename and store the picture in the public directory
            $picture = $request->file('image');
            $pictureName = time() . '_' . $picture->getClientOriginalName();
            $picture->move(public_path('pictures'), $pictureName);
            $ca->image = 'pictures/' . $pictureName;
        }
        // Update the team
       $ca->name = $request->name;
       $ca->role = $request->role;
       $ca->email = $request->email;
       $ca->status = $request->status;
       $ca->phone = $request->phone;
        
        $ca->save();
        $user = User::where('id',$ca->user_id)->first();
        if($user){
            
        $user = User::findOrFail($ca->user_id);
        $user->status = $ca->status; // Toggle status
        $user->last_name = $request->last_name; // Toggle status
        $user->email = $ca->email; // Toggle status
        $user->profile_picture = $ca->image; // Toggle status
        $user->save();
        }
        // Redirect with a success message
        $route = session('route');
        if($route){
            return redirect()->route($route)->with('success', 'Club administrator updated successfully.');

        }else{
            return redirect()->route('club.dashboard')
            ->with('success', 'Club administrator updated successfully.');
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $ca = CA::findOrFail($id);
        $ca->status = !$ca->status; // Toggle status
        $ca->save();

        $user = User::findOrFail($ca->user_id);
        $user->status = !$user->status; // Toggle status
        $user->save();

        return back()->with('success', 'Club Administration status updated successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // echo "club administrator";
        // echo session('club_id');

       $title = "Create Club Administrator";
        return view('club.administrator.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|min:10|max:13',
            'email' => 'required|email|max:255|unique:users,email',
        ]);
          
        // Check if validation fails
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Handle logo upload
        $logoPath = null;
        if ($request->hasFile('image')) {
            $logo = $request->file('image');
             $targetPath = public_path('pictures');
             if (!file_exists($targetPath)) {
                mkdir($targetPath, 0777, true);
            }

            $fileName = time() . '_' . $logo->getClientOriginalName();
            $logo->move($targetPath, $fileName);
            $logoPath = 'pictures/' . $fileName;
        }
        $pass = Hash::make($request->password);
        $user = User::create([
                'name' => $request->input('name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'role' => 'club',
                'status' => $request->status,
                'password' => $pass,
                'profile_picture' => $logoPath,

        ]);
        // Create a new club record
        $club = new CA();
        $club->image = $logoPath;
        $club->user_id = $user->id;
        $club->club_id = session('club_id');
        $club->name = $request->input('name');
        $club->phone = $request->input('phone');
        $club->role = $request->input('role');
        $club->status = $request->status;
        $club->email = $request->input('email');
        $club->save();

        // Redirect with success message
        return redirect()->route('club.dashboard')->with('success', 'Club Administrator created successfully!');

       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

   


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $id = base64_decode($id);
        $ca = CA::find($id);
        User::where('id',$ca->user_id)->delete();
        // dd($ca->user_id);
        $ca->delete();
        // Redirect back with a success message
        return back()->with('success', 'Club Administrator deleted successfully.');
    }
}
