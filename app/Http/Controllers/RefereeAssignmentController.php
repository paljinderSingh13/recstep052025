<?php

// app/Http/Controllers/LeagueTeamController.php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\LeagueTeam;
use App\Models\GameReferee;
use App\Models\LeagueSchedule;
use App\Models\LeagueRefereePosition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RefereeAssignmentController extends Controller
{
     public function index()
    {
        $referees = GameReferee::latest()->paginate(10);
        $user  = auth()->user();
        $title = 'League Referee';
        return view('leagues/referee.index', compact('referees','user','title'));
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

        GameReferee::create($request->all());
        $slug = session('slug');
        return redirect()->route('referees.index',$slug)
            ->with('success', 'Referee created successfully.');
    }

    protected function getCurrentAssignments($gameId)
    {
        return GameReferee::with(['leagueReferee', 'position'])
            ->where('game_id', $gameId)
            ->where('league_id', session('league_id'))
            ->get()
            ->map(function ($assignment) {
                return [
                    'position_id' => $assignment->position_id,
                    'referee_id' => $assignment->user_id,
                    'referee_name' => $assignment->leagueReferee->first_name . ' ' . $assignment->leagueReferee->last_name
                ];
            });
    }

    public function assignReferees(Request $request)
    {
        $slug = session('slug');
        $validated = $request->validate([
        'game_id' => 'required',
        'assignments' => 'required|array',
        'assignments.*.referee_id' => 'required'
    ]);

    try {
        \DB::transaction(function () use ($request) {
            // First delete existing assignments for this game
            GameReferee::where('game_id', $request->game_id)
                     ->where('league_id', session('league_id'))
                     ->delete();

            // Create new assignments
            foreach ($request->assignments as $positionId => $assignment) {
                GameReferee::create([
                    'game_id' => $request->game_id,
                    'user_id' => $assignment['referee_id'],
                    'position_id' => $positionId,
                    'league_id' => session('league_id'),
                    'assigned_by' => auth()->id(),
                    'assigned_at' => now()
                ]);
            }
        });

        return response()->json([
            'success' => true,
            'message' => 'Referees assigned successfully!',
            'assignments' => $this->getCurrentAssignments($request->game_id)
        ]);

    } catch (\Exception $e) {
        \Log::error('Referee assignment failed: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Failed to assign referees: ' . $e->getMessage()
        ], 500);
    }
        
    }
}