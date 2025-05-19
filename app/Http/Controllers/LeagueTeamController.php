<?php

// app/Http/Controllers/LeagueTeamController.php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\LeagueTeam;
use App\Models\Club\Team;
use App\Models\User;
use App\Models\LeagueDivision;
use App\Models\LeaguePlayerPayment;
use App\Models\Club\Club;
use Illuminate\Http\Request;

class LeagueTeamController extends Controller
{
     public function index($slug)
    {
        $league_id = session('league_id');
        $teams = LeagueTeam::where('league_id',$league_id)->paginate(20);
        $user  = auth()->user();
        $title = "Team";
        $payments = LeaguePlayerPayment::where('league_id',$league_id)->get()->toArray();
        return view('leagues/leagueTeams.index', compact('teams','user','title','payments'));
    }

	public function show(){
	
        $title = "Team";
	return view('leagues/leagueTeams.show',compact('title'));


	}

    /**
     * Show the form for creating a new league team
     */
    public function create(Request $request)
    {
        $user = auth()->user();
        $title = "Team";
        $clubs = CLub::where('status',1)->get();
        $divisions = LeagueDivision::where('league_id',session('league_id'))->get();
        return view('leagues/leagueTeams.create',compact('user','title','clubs','divisions'));
    }

    /**
     * Store a newly created league team
     */
    public function store(Request $request, League $league)
    {
        $validated = $request->validate([
            'team_id' => 'required',
            'division' => 'required'
        ]);

        $leagueTeam = LeagueTeam::create([
            'team_id' => $validated['team_id'],
            'division' => $validated['division'],
            'league_id' => session('league_id'),
            'user_id' => auth()->user()->id,
            'status' => true
        ]);
        $slug = session('slug');
        $name = $leagueTeam->team['name'];
        $league_id = session('league_id');
        $title = $name.' team added';
        $type = 'added';
        log_league_action($league_id, $title, $type, $link = null);
        return redirect()->route('league.teams.index',$slug)->with('success', 'Team created successfully!');
    }

    /**
     * Show the form for editing a league team
     */
    public function getClubTeams($slug,$club)
    {
        
        $club = Club::where('id',$club)->first();
        $teams = Team::where('club_id',$club['id'])->get();
        $user  = auth()->user();
        return response()->json($teams);
    }

    public function edit(League $league, LeagueTeam $leagueTeam)
    {
        $team = LeagueTeam::where('user_id',auth()->user()->id)->first();
        $user  = auth()->user();
        return view('leagues/leagueTeams.edit', compact('team', 'user'));
    }

    /**
     * Update the specified league team
     */
    public function update(Request $request, League $league, LeagueTeam $leagueTeam)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'nullable|email',
            'home_field_id' => 'nullable'
        ]);

        $leagueTeam->update([
            'name' => $validated['name'],
            'home_field' => $validated['home_field_id'],
            'email' => $validated['email'],
            'status' => $request->status
        ]);

        return redirect()->back()
            ->with('success', 'Team updated successfully!');
    }

    /**
     * Remove the specified league team
     */
    public function destroy(League $league, LeagueTeam $leagueTeam)
    {

        $leagueTeam->delete();

        return redirect()->back()
            ->with('success', 'Team deleted successfully!');
    }
}