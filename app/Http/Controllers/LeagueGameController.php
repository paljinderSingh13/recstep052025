<?php

// app/Http/Controllers/LeagueTeamController.php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\LeagueTeam;
use App\Models\LeagueGame;
use App\Models\User;
use Illuminate\Http\Request;

class LeagueGameController extends Controller
{
     public function index()
    {
        $teams = LeagueTeam::where('user_id',auth()->user()->id)->paginate(20);
        $user  = auth()->user();
        $fields = LeagueTeam::where('user_id','qq')->get();
        $title = 'League Games';
        return view('leagues/game.index', compact('teams','user','title','fields'));
    }

	public function show(){
	
	return view('leagues/game.show');


	}

    /**
     * Show the form for creating a new league team
     */
    public function create(Request $request)
    {
        $user = auth()->user();
        $fields = [];
        $teams = LeagueTeam::where('user_id',auth()->user()->id)->paginate(20);
        $title = 'League Games';
        return view('leagues/game.create',compact('user','title','fields','teams'));
    }

    /**
     * Store a newly created league team
     */
    public function store(Request $request, League $league)
    {
        $validated = $request->validate([
            'game_date' => 'required',
            'game_time' => 'required',
            'field_id' => 'required',
            'game_type' => 'required|string|max:50',
            'duration_minutes' => 'required',
            'division' => 'required|string|max:50',
            'home_team_id' => [
                'required',
            ],
            'away_team_id' => [
                'required',
                'exists:teams,id'
            ],
        ]);

        try {
            $game = LeagueGame::create($validated);
            
            return redirect()->route('league.game.index')
                ->with('success', 'Game scheduled successfully!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error scheduling game: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show the form for editing a league team
     */
    public function edit(League $league, LeagueTeam $leagueTeam)
    {
        $team = LeagueTeam::where('user_id',auth()->user()->id)->first();
        $user  = auth()->user();
        return view('leagues/game.edit', compact('team', 'user'));
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