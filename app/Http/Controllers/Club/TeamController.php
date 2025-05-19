<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Models\Club\Team;
use App\Models\Club\Club;
use App\Models\Club\Player;
use App\Models\Club\Administrator;
use App\Models\Club\Schedule;
use App\Models\Club\ClubAdministrator as CA;
use App\Models\Club\TeamsTeamAdministrator;
use App\Models\Club\PlayerMetaTeam;
use App\Models\Club\PlayerMetaAdministrator;
use App\Models\User;
use Illuminate\Support\Str;
use Hash;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function allTeamDashboard(){

        $id =  session('club_id');
        
        session()->put('route','team.allTeamDashboard');
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
        $title = "Teams";



        if(auth()->user()->role == 'player' ){
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

        return view('team.allTeam', compact('id','title','teams' , 'players', 'scheduleTournaments', 'scheduleGame','schedulePractice'));
    }

    public function teamAdministrator(){

        $id =  session('club_id');
       //echo session('club_id');
       //dd($id);
        session()->put('route','team.team_administrator');
       $club_administrator = CA::where('club_id',$id)->get();
       $teams = Team::withCount('players')->where('club_id',$id)->get();
       // dd($teams);
       $pluck_teams = Team::with('')->where('club_id',$id)->pluck('id');
    //    dd($pluck_teams->all());
       
        $players = Player::with(['teamMeta.team','administrator.user'])->where('club_id', $id)->get();

         //dd($players);
       
        $scheduleTournaments = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();

        $scheduleGame = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
        $schedulePractice = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
        $title = "Team Administrator";
            $teamsTeamAdministrators = TeamsTeamAdministrator::whereIn('team_id',$pluck_teams)->pluck('team_administrator_id');
        $administrators = Administrator::with(['teamAdmin','teamAdminMeta'])->whereIn('id',$teamsTeamAdministrators)->get();

        if(auth()->user()->role == 'player' ){
            $playerMetaTeam = PlayerMetaTeam::where('user_id',auth()->user()->id)->pluck('team_id');
            $teams = Team::withCount('players')->whereIn('id',$playerMetaTeam)->get();
           // dd($teams);
           $pluck_teams = Team::with('')->whereIn('id',$playerMetaTeam)->pluck('id');
            
        //    dd($pluck_teams->all());
           
            $players = Player::with(['teamMeta.team','administrator.user'])->where('club_id', $id)->get();

             //dd($players);
           
            $scheduleTournaments = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();

            $scheduleGame = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
            $schedulePractice = Schedule::with('team')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
            $title = "Team Administrator";
                $teamsTeamAdministrators = TeamsTeamAdministrator::whereIn('team_id',$pluck_teams)->pluck('team_administrator_id');
            $administrators = Administrator::with(['teamAdmin','teamAdminMeta'])->whereIn('id',$teamsTeamAdministrators)->get();
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
            $title = "Team Administrator";
        }
        
        return view('team.teamDashboard', compact('id','title','teams','club_administrator' ,'administrators', 'players', 'scheduleTournaments', 'scheduleGame','schedulePractice'));
        
    }

    public function teamDashboardSchedule(){

        $id =  session('club_id');
       //echo session('club_id');
       //dump($id);
        session()->put('route','team.schedule');
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
        $title = "Schedules";



        if(auth()->user()->role == 'player' || auth()->user()->role == 'player_administrator'){
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

        return view('team.teamSchedule', compact('id','title','teams','club_administrator' , 'players', 'scheduleTournaments', 'scheduleGame','schedulePractice'));
    }



    public function index($id)
    {
         $id = base64_decode($id);
       
         $teams = Team::where('club_id',$id)->get();
        return view('team.list', compact('id','teams'));
    }

    public function info($id)
    {
        $teamId =   $id = base64_decode($id);
        $players =[];// Player::with('teamMeta');//where('team_id',$id)->get();

        $players = Player::whereHas('teamMeta', function ($query) use ($teamId) {
            $query->where('team_id', $teamId);
        })->get();


        //dump(1, $id, $players );
        $administrators = Administrator::whereHas('teamAdminMeta', function ($query) use($teamId){
            $query->where('team_id', $teamId);
        } )->get();
        // where('team_id',$id)->get();
       $scheduleTournaments = Schedule::where('team_id',$id)->where('type','Tournaments')->get();
       $scheduleGame = Schedule::where('team_id',$id)->where('type','Game')->get();
       $schedulePractice = Schedule::where('team_id',$id)->where('type','Practice')->get();
        $info = Team::find($id);
        $title = 'Team - '.$info->name;
        // return view('team.info',compact('id', 'title', 'players','administrators','scheduleTournaments','scheduleGame','schedulePractice'));
        return view('team.info',compact('id', 'title', 'players','administrators','scheduleTournaments','scheduleGame','schedulePractice'));
    }
    public function tform()
    {
        return view('team.tform');
    }
    public function tlist()
    {
        return view('team.tlist');
    }
    public function adminlist()
    {
        return view('team.adminlist');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $id = base64_decode($id);
        $title = "Create Team";
        return view('team.create',compact('id','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $min = 1000;  // 7-digit number minimum
        $max = 9999;  
        $randomId = random_int($min, $max);

        // Validate the incoming request data
        $request->validate([
            'club_id'   => 'required|integer',
            'name'      => 'required|string|max:255',
            'age_group' => 'required|string|max:255',
            'season'    => 'required|string|max:255',
            'status'    => 'required|string|in:1,0',
            'logo'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate logo upload
            'flag'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate logo upload
        ]);

        $club = Club::where('id', $request->club_id)->first();

        // Create a new Team instance and save the data
        $t = Team::create([
            'club_id'   => $request->club_id,
            'name'      => $request->name,
            'age_group' => $request->age_group,
            'season'    => $request->season,
            'status'    => $request->status,
        ]);

        // Generate unique team ID
        $firstThreeCharsClub = substr($club['name'], 0, 3);
        $firstThreeCharsTeam = substr($request->name, 0, 2);
        $team_unique_id = strtoupper($firstThreeCharsClub) . $t->id . strtoupper($firstThreeCharsTeam);

        $t->team_unique_id = $team_unique_id;

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = 'team_logo_' . time() . '.' . $logo->getClientOriginalExtension();
            $logoPath = 'uploads/teams/' . $t->id . '/'; // Save inside team_id folder
            $logo->move(public_path($logoPath), $logoName);
            $t->logo = $logoPath . $logoName;
        }

        if ($request->hasFile('flag')) {
            $flag = $request->file('flag');
            $flagName = 'team_flag_' . time() . '.' . $flag->getClientOriginalExtension();
            $flagPath = 'uploads/teams/flag/' . $t->id . '/'; // Save inside team_id folder
            $flag->move(public_path($flagPath), $flagName);
            $t->flag = $flagPath . $flagName;
        }

        $t->save();

        $route = session('route');
        if ($route) {
            return redirect()->route($route)->with('success', 'Team created successfully!');
        } else {
            return redirect()->route('club.dashboard', base64_encode($request->club_id))->with('success', 'Team created successfully!');
        }
    }


    /**
     * Display the specified resource.
     */
    public function mainTeamList($id)
    {
        //
        $pluck_teams = Team::where('team_unique_id',$id)->pluck('id');
        $teamPlayersGet = PlayerMetaTeam::whereIn('team_id',$pluck_teams)->pluck('player_id');
        $players = Player::with(['teamMeta.team','administrator.user'])->whereIn('id',$teamPlayersGet)->get();
        return view('team.globalTeamPlayerList',compact('players'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $team_id = base64_decode($id);
        $team = Team::where('id',$team_id)->first();
        $title =  $team->name;
        return view('team.edit',compact('team_id','team','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $id = base64_decode($id);
    $team = Team::where('id', $id)->first();

    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'age_group' => 'required|string|max:255',
        'season' => 'required|string|max:255',
        'status' => 'required|boolean',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate logo upload
        'flag' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate logo upload
    ]);

    // Update the team data
    $team->update([
        'name' => $request->name,
        'age_group' => $request->age_group,
        'season' => $request->season,
        'status' => $request->status,
    ]);

    // Handle logo update
    if ($request->hasFile('logo')) {
        // Delete the old logo if it exists
        if (!empty($team->logo) && file_exists(public_path($team->logo))) {
            unlink(public_path($team->logo));
        }

        // Upload the new logo
        $logo = $request->file('logo');
        $logoName = 'team_logo_' . time() . '.' . $logo->getClientOriginalExtension();
        $logoPath = 'uploads/teams/' . $team->id . '/'; // Save inside team_id folder
        $logo->move(public_path($logoPath), $logoName);
        $team->update(['logo' => $logoPath . $logoName]);
    }

    if ($request->hasFile('flag')) {
        // Delete the old logo if it exists
        if (!empty($team->flag) && file_exists(public_path($team->flag))) {
            unlink(public_path($team->flag));
        }

        // Upload the new logo
        $flag = $request->file('flag');
        $flagName = 'team_flag_' . time() . '.' . $flag->getClientOriginalExtension();
        $flagPath = 'uploads/teams/flag/' . $team->id . '/'; // Save inside team_id folder
        $flag->move(public_path($flagPath), $flagName);
        $team->update(['flag' => $flagPath . $flagName]);
    }

    // Redirect with a success message
    $route = session('route');
    if ($route) {
        return redirect()->route($route)->with('success', 'Team updated successfully.');
    } else {
        return redirect()->route('club.dashboard', base64_encode($team->club_id))
            ->with('success', 'Team updated successfully.');
    }
}


    public function updateStatus(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->status = !$team->status; // Toggle status
        $team->save();
            $route = session('route');
            if($route){
                return redirect()->route($route)->with('success', 'Team updated successfully!');

            }else{
                return redirect()->route('club.dashboard')->with('success', 'Team status updated successfully.');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = base64_decode($id);
        $team = Team::find($id);
        $team->delete();

        // Redirect back with a success message
        return back()->with('success', 'Team deleted successfully.');
    }
}
