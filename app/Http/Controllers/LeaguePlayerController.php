<?php

// app/Http/Controllers/LeagueTeamController.php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\LeagueTeam;
use App\Models\LeaguePlayer;
use App\Models\User;
use Illuminate\Http\Request;

class LeaguePlayerController extends Controller
{
     public function index()
    {
        $players = LeaguePlayer::with('team')
                ->orderBy('last_name')
                ->paginate(20);
        $user  = auth()->user();
        $title = 'League Player';
        return view('leagues/player.index', compact('players','user','title'));
    }

	public function show(){
	
    $title = 'League Player';
	return view('leagues/player.show',compact('title'));


	}

    /**
     * Show the form for creating a new league team
     */
    public function create(Request $request)
    {
        $teams = LeagueTeam::where('user_id',auth()->user()->id)->get();
        $user = auth()->user();
        $title = 'League Player';
        return view('leagues/player.create',compact('user','title','teams'));
    }

    /**
     * Store a newly created league team
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'team_id' => 'required|exists:teams,id',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'gender' => 'required',
            'email' => 'required|email|unique:league_players,email',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'required|date|before:today',
            'address' => 'nullable|string|max:255'
        ]);

        try {
            $player = LeaguePlayer::create($validated);
            
            return redirect()->back()
                ->with('success', 'Player added successfully!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error adding player: ' . $e->getMessage())
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
        return view('leagues/player.edit', compact('team', 'user'));
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