<?php

// app/Http/Controllers/LeagueTeamController.php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\LeagueDivision;
use App\Models\User;
use Illuminate\Http\Request;

class LeagueDivisionController extends Controller
{
     public function index()
    {
        $divisions = LeagueDivision::where('league_id',session('league_id'))->paginate(20);
        $user  = auth()->user();
        $title = 'League Division';
        return view('leagues/division.index', compact('divisions','user','title'));
    }

	public function show(){
	
    $title = 'League Division';
	return view('leagues/division.show',compact('title'));


	}

    /**
     * Show the form for creating a new league team
     */
    public function create(Request $request)
    {
        $user = auth()->user();
        $title = 'League Division';
        return view('leagues/division.create',compact('user','title'));
    }

    /**
     * Store a newly created league team
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        LeagueDivision::create([
            'name' => $request->name,
            'league_id' => session('league_id')
        ]);
        $slug = session('slug');

        $league_id = session('league_id');
        $title = $request->name.' division created';
        $type = 'Division';
        $linkTitle = 'View Division';
        $link = route('league.division.index',$slug);
        log_league_action($league_id, $title, $type,$linkTitle,$link);
        return redirect()->route('league.division.index',$slug)
            ->with('success', 'Division created successfully.');
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