<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Models\Club\Player;
use App\Models\Club\PlayerMetaTeam;
use App\Models\Club\PlayerMetaAdministrator;

use App\Models\Club\Team;
use App\Models\Club\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Hash;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id =  session('club_id');
        
        session()->put('route','player.index');
       //echo session('club_id');
       //dump($id);\
       $teams = Team::withCount('players')->where('club_id',$id)->get();
       // dd($teams);
       $pluck_teams = Team::where('club_id',$id)->pluck('id');
    //    dd($pluck_teams->all());
       
        $players = Player::with(['teamMeta.team','administrator.user'])->where('club_id', $id)->get();

         //dd($players);
       
        $scheduleTournaments = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();

        $scheduleGame = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
        $schedulePractice = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
        $title = "Players";



        if(auth()->user()->role == 'player' || auth()->user()->role == 'player_administrator'){
            $playerMetaTeam = PlayerMetaTeam::where('user_id',auth()->user()->id)->pluck('team_id');
            $teams = Team::withCount('players')->whereIn('id',$playerMetaTeam)->get();
            $pluck_teams = Team::where('club_id',$id)->whereIn('id',$playerMetaTeam)->pluck('id');
            $teamPlayersGet = PlayerMetaTeam::whereIn('team_id',$pluck_teams)->pluck('player_id');
            $players = Player::with(['teamMeta.team','administrator.user'])->whereIn('id',$teamPlayersGet)->get();
            $scheduleTournaments = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();
            $scheduleGame = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
            $schedulePractice = Schedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
            $title = "Player Administrator";
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

        return view('team.players.allTeam', compact('id','title','teams' , 'players', 'scheduleTournaments', 'scheduleGame','schedulePractice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $id = base64_decode($id);
        // dd($id);

        $player['permanent'] = Player::select('priority')->where('type','permanent')->where('team_id',$id)->pluck('priority')->toArray();
        $player['substitute'] = Player::select('priority')->where('type','substitute')->where('team_id',$id)->pluck('priority')->toArray();
         return view('team.players.create', compact('id','player'));
    }
     public function add()
    {   
        $id =  session('club_id');
        $teams = Team::where('club_id',$id)->get();
        $players = Player::orderBy('id','desc')->get();
        $title = "Create Player";
         return view('team.players.add',compact('title','teams','players'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all(););
         // Validation rules
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'priority' => 'required|integer',
            'dob' => 'required|date',
            'proof_id' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:players,email',
            'status' => 'required|boolean',
        ]);

         $pass = Hash::make($request->password);
        $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'dob' => $request->input('dob'),
                'gender' => $request->input('gender'),
                'phone' => $request->input('phone'),
                'role' => 'player',
                'password' => $pass,

        ]);
        $player = new Player();
        $player->team_id = $request->team_id;
        $player->name = $request->name;
        $player->user_id = $user->id;
        $player->type = $request->type;
        $player->priority = $request->priority;
        $player->dob = $request->dob;
        $player->phone = $request->phone;
        $player->email = $request->email;
        $player->status = $request->status;

         if ($request->hasFile('picture')) {
            // Generate a unique filename and store the picture in the public directory
            $picture = $request->file('picture');
            $pictureName = time() . '_' . $picture->getClientOriginalName();
            $picture->move(public_path('teams/'.$request->team_id.'/pictures'), $pictureName);
            $player->picture = 'teams/'.$request->team_id.'/pictures/' . $pictureName;
        }

        if ($request->hasFile('proof_id')) {
            // Generate a unique filename and store the proof_id in the public directory
            $proof = $request->file('proof_id');
            $proofName = time() . '_' . $proof->getClientOriginalName();
            $proof->move(public_path('teams/'.$request->team_id.'/proofs'), $proofName);
            $player->proof_id = 'teams/'.$request->team_id.'/proofs/' . $proofName;
        }

        $player->save();

        return redirect()->route('club.dashboard')->with('success', 'Player created successfully.');
    
    }



     public function save(Request $request)
    {
         // Validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'dob' => 'required',
            'phone' => 'nullable|max:15',
            'email' => ['required',
                        'email',
                        Rule::unique('users', 'email'),   // Unique in users table
                        Rule::unique('players', 'email'), // Unique in players table
                        ],
            'password' => 'required|max:15',
            'status' => 'required',
        ]);

         $pass = Hash::make($request->password);
        $user = User::create([
                'name' => $request->input('name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'dob' => $request->input('dob'),
                'gender' => $request->input('gender'),
                'phone' => $request->input('phone'),
                'role' => 'player',
                'password' => $pass,

        ]);
        $club_id =  session('club_id');
        $player = new Player();
        $player->name = $request->name;
        $player->user_id = $user->id;
        $player->club_id = $club_id;
        $player->type = $request->type;
        $player->priority = $request->priority;
        $player->dob = $request->dob;
        $player->phone = $request->phone;
        $player->email = $request->email;
        $player->status = $request->status;

         if ($request->hasFile('picture')) {
            // Generate a unique filename and store the picture in the public directory
            $picture = $request->file('picture');
            $pictureName = time() . '_' . $picture->getClientOriginalName();
            $picture->move(public_path('teams/'.$request->team_id.'/pictures'), $pictureName);
            $player->picture = 'teams/'.$request->team_id.'/pictures/' . $pictureName;
            $u = User::where('id',$user->id)->update(['profile_picture' => $player->picture]);
        }

        if ($request->hasFile('proof_id')) {
            // Generate a unique filename and store the proof_id in the public directory
            $proof = $request->file('proof_id');
            $proofName = time() . '_' . $proof->getClientOriginalName();
            $proof->move(public_path('teams/'.$request->team_id.'/proofs'), $proofName);
            $player->proof_id = 'teams/'.$request->team_id.'/proofs/' . $proofName;
        }

        $player->save();

        foreach ($request->team as $team) {
            PlayerMetaTeam::create([
                            'user_id' => $user->id,
                            'player_id' => $player->id,
                            'team_id' => $team,
                ]);
        }

        if ($request->admin_name && $request->admin_email && $request->admin_password) {
            $admin = new User();
            $admin->name = $request->admin_name;
            $admin->email = $request->admin_email;
            $admin->phone = $request->admin_phone;
            $admin->role = 'player_administrator';
            $admin->password = Hash::make($request->admin_password);
            $admin->save();
            
            PlayerMetaAdministrator::create([
                            'user_id' => $admin->id,
                            'player_id' => $player->id,
                            'club_id' => $club_id,
                ]);
        }
        return redirect()->route('player.index')->with('success', 'Player created successfully.');

       // return back()->with('success', 'Player created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
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
        $player = Player::where('id',$id)->first();
        $players['permanent'] = Player::select('priority')->where('type','permanent')->where('team_id',$player->team_id)->pluck('priority')->toArray();
        $players['substitute'] = Player::select('priority')->where('type','substitute')->where('team_id',$player->team_id)->pluck('priority')->toArray();
        $title = "Edit Player";
        return view('team.players.edit',compact('player','players','title'));
    }

     public function editPlayer($id)
    {
        //
        $id = base64_decode($id);
        $player = Player::where('id',$id)->first();
        $players['permanent'] = Player::where('type','permanent')->where('team_id',$player->team_id)->get();
        $players['substitute'] = Player::where('type','substitute')->where('team_id',$player->team_id)->get();
        
        $cid =  session('club_id');
        $teams = Team::where('club_id',$cid)->get();
        $playerMetaTeam = PlayerMetaTeam::where('player_id',$id)->pluck('team_id');
        $playerMetaAdministrators = PlayerMetaAdministrator::where('player_id',$id)->get();
        $title = "Edit Player";
        return view('team.players.editPlayer',compact('title', 'player','players','teams','playerMetaTeam','playerMetaAdministrators'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'priority' => 'required|integer',
            'dob' => 'required|date',
            'proof_id' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
            'phone' => 'nullable|max:15',
            'email' => 'required|email|max:255',
            'status' => 'required|boolean',
        ]);

    // Find the player by ID
        $player = Player::findOrFail($id);
        $player->team_id = $request->team_id;
        $player->name = $request->name;
        $player->type = $request->type;
        $player->priority = $request->priority;
        $player->dob = $request->dob;
        $player->phone = $request->phone;
        $player->email = $request->email;
        $player->status = $request->status;

        // Handle picture upload
        if ($request->hasFile('picture')) {
            // Delete the old picture if it exists
            if ($player->picture && file_exists(public_path($player->picture))) {
                unlink(public_path($player->picture));
            }
            // Generate a unique filename and store the picture in the public directory
            $picture = $request->file('picture');
            $pictureName = time() . '_' . $picture->getClientOriginalName();
            $picture->move(public_path('teams/' . $request->team_id . '/pictures'), $pictureName);
            $player->picture = 'teams/' . $request->team_id . '/pictures/' . $pictureName;
        }

        // Handle proof_id document upload
        if ($request->hasFile('proof_id')) {
            // Delete the old proof document if it exists
            if ($player->proof_id && file_exists(public_path($player->proof_id))) {
                unlink(public_path($player->proof_id));
            }
            // Generate a unique filename and store the proof_id in the public directory
            $proof = $request->file('proof_id');
            $proofName = time() . '_' . $proof->getClientOriginalName();
            $proof->move(public_path('teams/' . $request->team_id . '/proofs'), $proofName);
            $player->proof_id = 'teams/' . $request->team_id . '/proofs/' . $proofName;
        }

        // Save the updated player details
        $player->save();

        // Redirect with success message
        return redirect()->route('club.dashboard')->with('success', 'Player updated successfully.');


    }


    public function updatePlayer(Request $request, $playerId)
    {
        // Validate the request
        $playerId = base64_decode($playerId);
        $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'dob' => 'required',
        'phone' => 'nullable|max:15',
        'email' => 'required|email|max:255|unique:players,email,' . $playerId,
        'status' => 'required',
    ]);

    // Find the existing player
    $player = Player::findOrFail($playerId);
    $user = User::findOrFail($player->user_id);

    // Update user details
    $user->name = $request->input('name');
    $user->last_name = $request->input('last_name');
    $user->email = $request->input('email');
    $user->status = $request->status;
    if ($request->password) {
        $user->password = Hash::make($request->password);
    }
    $user->save();

    // Update player details
    $club_id = session('club_id');
    $player->name = $request->name;
    $player->club_id = $club_id;
    $player->type = $request->type;
    $player->priority = $request->priority;
    $player->dob = $request->dob;
    $player->phone = $request->phone;
    $player->email = $request->email;
    $player->status = $request->status;

    if ($request->hasFile('picture')) {
        // Generate a unique filename and store the picture in the public directory
        $picture = $request->file('picture');
        $pictureName = time() . '_' . $picture->getClientOriginalName();
        $picture->move(public_path('teams/' . $request->team_id . '/pictures'), $pictureName);
        $player->picture = 'teams/' . $request->team_id . '/pictures/' . $pictureName;
        $u = User::where('id',$user->id)->update(['profile_picture' => $player->picture]);
    }

    if ($request->hasFile('proof_id')) {
        // Generate a unique filename and store the proof_id in the public directory
        $proof = $request->file('proof_id');
        $proofName = time() . '_' . $proof->getClientOriginalName();
        $proof->move(public_path('teams/' . $request->team_id . '/proofs'), $proofName);
        $player->proof_id = 'teams/' . $request->team_id . '/proofs/' . $proofName;
    }

    $player->save();

    // Update player teams
    PlayerMetaTeam::where('player_id', $player->id)->delete();
    foreach ($request->team as $team) {
        PlayerMetaTeam::create([
            'user_id' => $user->id,
            'player_id' => $player->id,
            'team_id' => $team,
        ]);
    }

    // Update administrator details if provided
    if ($request->admin_name && $request->admin_email && $request->admin_password) {
        $adminMeta = PlayerMetaAdministrator::where('player_id', $player->id)->first();
        
        if ($adminMeta) {
            $adminUser = User::find($adminMeta->user_id);
            $adminUser->name = $request->admin_name;
            $adminUser->email = $request->admin_email;
            $adminUser->phone = $request->admin_phone;
            $adminUser->password = Hash::make($request->admin_password);
            $adminUser->save();
        } else {
            $admin = new User();
            $admin->name = $request->admin_name;
            $admin->email = $request->admin_email;
            $admin->phone = $request->admin_phone;
            $admin->role = 'player_administrator';
            $admin->password = Hash::make($request->admin_password);
            $admin->save();

            PlayerMetaAdministrator::create([
                'user_id' => $admin->id,
                'player_id' => $player->id,
                'club_id' => $club_id,
            ]);


        }


    }
        $userStatus = PlayerMetaAdministrator::where('player_id',$player->id)->pluck('user_id');
        if($userStatus){
            $aUser = User::whereIn('id',$userStatus)->update(['status'=>$request->status]);
        }
        $route = session('route');
        if($route){
        return redirect()->route($route)->with('success', 'Player updated successfully!');

        }else{
    return redirect()->route('club.dashboard')->with('success', 'Player updated successfully.');

      //  return back()->with('success', 'Player updated successfully.');
        }
    }


      public function updateStatus(Request $request, $id)
    {
        $id = base64_decode($id);
        $player = Player::findOrFail($id);
        $player->status = !$player->status; // Toggle status
        $player->save();

        $user = User::findOrFail($player->user_id);
        $user->status = !$user->status;
        $user->save();

        $userStatus = PlayerMetaAdministrator::where('player_id',$id)->pluck('user_id');
        if($userStatus){
            $aUser = User::whereIn('id',$userStatus)->update(['status'=>$player->status]);
        }
        return back()->with('success', 'Player status updated successfully.');
    }

    public function storeAdmin(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users',
                'phone' => 'required|max:15',
                'password' => 'required|min:8',
            ]);

            $admin = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => 'player_administrator',
                'password' => Hash::make($request->password),
            ]);

            PlayerMetaAdministrator::create([
                    'user_id' => $admin->id,
                    'player_id' => $request->playerId,
                    'club_id' => $request->club_id,
                ]);

            return response()->json(['success' => true, 'message' => 'Admin added successfully.']);
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $playerId = base64_decode($id);
    $player = Player::findOrFail($playerId);
    $user = User::findOrFail($player->user_id);

    // Delete player picture if it exists
    if ($player->picture && file_exists(public_path($player->picture))) {
        unlink(public_path($player->picture));
    }

    // Delete player proof ID if it exists
    if ($player->proof_id && file_exists(public_path($player->proof_id))) {
        unlink(public_path($player->proof_id));
    }

    // Delete PlayerMetaTeam entries
    PlayerMetaTeam::where('player_id', $player->id)->delete();

    // Delete administrator if associated
    $adminMeta = PlayerMetaAdministrator::where('player_id', $player->id)->first();
    if ($adminMeta) {
        $adminUser = User::find($adminMeta->user_id);
        $adminMeta->delete(); // Delete PlayerMetaAdministrator entry
        if ($adminUser) {
            $adminUser->delete(); // Delete administrator user
        }
    }

    // Delete player and associated user
    $player->delete();
    $user->delete();

        // Redirect back with a success message
        return back()->with('success', 'Player deleted successfully.');
    }
}
