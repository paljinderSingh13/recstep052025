<?php

// app/Http/Controllers/LeagueTeamController.php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\LeagueTeam;
use App\Models\LeagueReferee;
use App\Models\LeagueSchedule;
use App\Models\LeagueDivision;
use App\Models\LeagueField;
use App\Models\GameReferee;
use App\Models\LeagueRefereePosition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RefereeController extends Controller
{
     public function index()
    {
        $referees = LeagueReferee::where('league_id',session('league_id'))->latest()->paginate(10);
        $user  = auth()->user();
        $title = 'League Referee';
        return view('leagues/referee.index', compact('referees','user','title'));
    }

	public function show(){
	
    $title = 'League Referee';
	return view('leagues/referee.show',compact('title'));


	}

    /**
     * Show the form for creating a new league team
     */
    public function create(Request $request)
    {
        $user = auth()->user();
        $title = 'League Referee';
        return view('leagues/referee.create',compact('user','title'));
    }

    /**
     * Store a newly created league team
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:league_referees,email',
            'phone' => 'nullable|string|max:20',
            'badge_id' => 'nullable|string|max:50',
            'region' => 'nullable|string|max:100',
        ]);
        $request['league_id'] = session('league_id');
        LeagueReferee::create($request->all());
        $slug = session('slug');
        return redirect()->route('referees.index',$slug)
            ->with('success', 'Referee created successfully.');
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
    public function positionIndex(League $league, LeagueTeam $leagueTeam)
    {
        $positions = LeagueRefereePosition::where('league_id',session('league_id'))->paginate(20);

        $user = auth()->user();
        $title = 'League Positions';
        return view('leagues/referee.position.index', compact('positions','user','title'));
    }
    public function positionCreate(League $league, LeagueTeam $leagueTeam)
    {

        $teams = LeagueTeam::where('user_id',auth()->user()->id)->paginate(20);
        $user = auth()->user();
        $title = 'League Referee';
        return view('leagues/referee.position.create', compact('teams','user','title'));
    }

    public function positionStore(Request $request)
    {
        $leagueId = session('league_id');

        // Validate with unique rule scoped to league_id
        Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:league_referee_positions,name,NULL,id,league_id,' . $leagueId,
        ])->validate();

        LeagueRefereePosition::create([
            'name' => $request->name,
            'league_id' => $leagueId
        ]);

        $slug = session('slug');
        return redirect()->route('referee.position', $slug)->with('success', 'Position Added successfully!');
    }
     // Controller
    public function positionAssign()
    {
        
        $games = LeagueSchedule::with('gameReferees')->where('league_id', session('league_id'))->paginate(20);
        $positions = LeagueRefereePosition::where('league_id',session('league_id'))->paginate(20);
        $referees = LeagueReferee::where('league_id',session('league_id'))->get();
        $user = auth()->user();

        $setupProgress = $this->getSetupProgress(session('league_id'));
        $setup_progress = $setupProgress;
        $title = 'League Referee Assignments';
        
        return view('leagues.referee.position.show', compact('games','setup_progress','referees', 'user','positions', 'title'));
    }


    protected function getSetupProgress($leagueId)
    {
        $counts = [
            'referee_count' => LeagueReferee::where('league_id', $leagueId)->count(), // Updated
            'referee_position_count' => LeagueRefereePosition::where('league_id', $leagueId)->count(), // Updated
            'referee_assignment_count' => GameReferee::whereHas('game', function($q) use ($leagueId) {
                $q->where('league_id', $leagueId);
            })->count()
        ];
        
        $totalSteps = 3;
        $completed = array_reduce($counts, function($carry, $item) {
            return $carry + ($item > 0 ? 1 : 0);
        }, 0);
        
        return array_merge($counts, [
            'completion_percentage' => ($completed / $totalSteps) * 100,
            'remaining_tasks' => $totalSteps - $completed,
            'is_complete' => $completed === $totalSteps
        ]);
    }

}