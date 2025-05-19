<?php

// app/Http/Controllers/LeagueTeamController.php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\LeagueTeam;
use App\Models\LeagueDivision;
use App\Models\LeagueField;
use App\Models\LeagueSchedule;
use App\Models\User;
use Illuminate\Http\Request;

class CommissionerController extends Controller
{
     public function index($slug)
    {
        $slug = session('slug');
        $teams = LeagueTeam::where('user_id',auth()->user()->id)->paginate(20);
        $user  = auth()->user();

        $leagueId = session('league_id'); // Or get from authenticated user
        
        // Get setup progress data
        $setupProgress = $this->getSetupProgress($leagueId);
        $setup_progress = $setupProgress;
        $title = 'Commissioner Tools';
        return view('leagues/commissioner.index', compact('teams','user','title','setup_progress'));
    }

      protected function getSetupProgress($leagueId)
    {
        $divisionCount = LeagueDivision::where('league_id', $leagueId)->count();
        $fieldCount = LeagueField::where('league_id', $leagueId)->count();
        $teamCount = LeagueTeam::where('league_id', $leagueId)->count();
        $gameCount = LeagueSchedule::where('league_id', $leagueId)->count();
        
        $totalSteps = 4;
        $completed = 0;
        
        if ($divisionCount > 0) $completed++;
        if ($fieldCount > 0) $completed++;
        if ($teamCount > 0) $completed++;
        if ($gameCount > 0) $completed++;
        
        $completionPercentage = ($completed / $totalSteps) * 100;
        
        return [
            'division_count' => $divisionCount,
            'field_count' => $fieldCount,
            'team_count' => $teamCount,
            'game_count' => $gameCount,
            'completion_percentage' => $completionPercentage,
            'remaining_tasks' => $totalSteps - $completed,
            'is_complete' => $completed === $totalSteps
        ];
    }
     public function settings()
    {
        $slug = session('slug');
        $teams = LeagueTeam::where('user_id',auth()->user()->id)->paginate(20);
        $user  = auth()->user();
        $title = 'Commissioner Tools';
        return view('leagues/commissioner/settings.index', compact('teams','user','title'));
    }

    /**
     * Show the form for creating a new league team
     */
    public function create(Request $request)
    {
        $user = auth()->user();
        $title = "Commissioner Tools";
        return view('leagues/commissioner.create',compact('user','title'));
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
        return view('leagues/commissioner.edit', compact('team', 'user'));
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
    public function show()
    {

        return view('leagues/commissioner.show');
    }
}