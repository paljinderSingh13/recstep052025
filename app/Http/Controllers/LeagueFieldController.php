<?php

// app/Http/Controllers/LeagueTeamController.php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\LeagueTeam;
use App\Models\User;
use Illuminate\Http\Request;

class LeagueFieldController extends Controller
{
     public function index()
    {
        $teams = LeagueTeam::where('user_id',auth()->user()->id)->paginate(20);
        $user  = auth()->user();
        return view('leagues/leagueTeams.index', compact('teams','user'));
    }

	public function show(){
	
	return view('leagues/leagueTeams.show');


	}

    /**
     * Show the form for creating a new league team
     */
    public function create(Request $request)
    {
        $user = auth()->user();
        return view('leagues/leagueTeams.create',compact('user'));
    }

    /**
     * Store a newly created league team
     */
    public function store(Request $request, League $league)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:league_teams,name,NULL,id,league_id,'.$league->id,
            'email' => 'nullable|email',
            'home_field_id' => 'nullable'
        ]);

        $leagueTeam = LeagueTeam::create([
            'name' => $validated['name'],
            'home_field' => $validated['home_field_id'],
            'user_id' => auth()->user()->id,
            'email' => $request->email,
            'status' => true
        ]);

        return redirect()->back()->with('success', 'Team created successfully!');
    }

    /**
     * Show the form for editing a league team
     */
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