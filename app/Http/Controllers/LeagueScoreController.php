<?php

// app/Http/Controllers/LeagueTeamController.php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\LeagueTeam;
use App\Models\User;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\LeagueSchedule;
use App\Models\LeagueDivision;
use App\Models\LeagueField;
use App\Models\Location;
use App\Models\PlayerLeagueSchedule;
use App\Models\Club\ClubAdministrator as CA;
use App\Models\PlayerMetaLeagueTeam;
use Carbon\Carbon;
use DB;

// temprary

// use App\Models\Club\Team;
// use App\Models\Club\PlayerMetaTeam;
use App\Models\Club\Player;

class LeagueScoreController extends Controller
{


    public function index($slug, $gameId)
    {
        $game = LeagueSchedule::where('id',$gameId)->first();
        $title = 'Enter Score';
        return view('leagues/schedule.score.index', [
            'title' => $title,
            'game' => $game,
            'awayTeamGameID' => $game->away_team_game_id ?? 0,
            'homeTeamGameID' => $game->home_team_game_id ?? 0,
            'awayTeamName' => $game->awayTeam->name ?? 'Away Team',
            'homeTeamName' => $game->homeTeam->name ?? 'Home Team',
            'gameDate' => optional($game->date)->format('D M d, h:i A'),
            'gameLocation' => optional($game->location)->name ?? 'Unknown',
        ]);
    }   

    

    public function create($slug,$id){
    $game = LeagueSchedule::where('id',$id)->first();
    $title = 'Enter Score';
    return view('leagues/schedule.score.create',compact('title','game'));
    }

    /**
     * Store a newly created league team
     */
     public function store(Request $request, $slug, $gameId)
    {
        $game = LeagueSchedule::findOrFail($gameId);

        $game->away_team_score = $request->away_team_score;
        $game->away_team_status = $request->away_team_status;
        $game->away_team_report = $request->away_team_report;

        $game->home_team_score = $request->home_team_score;
        $game->home_team_status = $request->home_team_status;
        $game->home_team_report = $request->home_team_report;

        $game->notes = $request->game_notes;

        $game->save();

        return redirect()->route('league.games.index', ['slug' => session('league_id'),'id' => $gameId])
                         ->with('success', 'Game score updated successfully.');
    }


    public function storestatScore(Request $request, $slug, $gameId)
        {
            $game = LeagueSchedule::with(['homeTeam', 'awayTeam'])->findOrFail($gameId);
            $league = League::where('slug', $slug)->firstOrFail();
            
            // Validate the request
            $request->validate([
                'away_players' => 'sometimes|array',
                'away_players.*.points' => 'integer|min:0',
                'away_players.*.rebounds' => 'integer|min:0',
                // Add validation for all other stats fields...
                
                'home_players' => 'sometimes|array',
                'home_players.*.points' => 'integer|min:0',
                'home_players.*.rebounds' => 'integer|min:0',
                // Add validation for all other stats fields...
            ]);
            
            DB::transaction(function () use ($request, $game) {
                // Process away team players
                if ($request->has('away_players')) {
                    foreach ($request->away_players as $playerId => $stats) {
                        $this->savePlayerStats($game->id, $playerId, $game->away_team_id, $stats);
                    }
                }
                
                // Process home team players
                if ($request->has('home_players')) {
                    foreach ($request->home_players as $playerId => $stats) {
                        $this->savePlayerStats($game->id, $playerId, $game->home_team_id, $stats);
                    }
                }
                
                // Update game status to completed
                $game->update(['status' => 'completed']);
            });
            
            return redirect()->route('league.schedule.index', $slug)
                ->with('success', 'Game results saved successfully');
        }

        private function savePlayerStats($gameId, $playerId, $teamId, $stats)
        {
            // Check if player exists on the team
            $player = Player::where('id', $playerId)
                ->where('team_id', $teamId)
                ->first();
            
            if (!$player) {
                return; // Or throw an exception
            }
            
            // Determine if player played (all zeros means likely didn't play)
            $played = collect($stats)->sum() > 0;
            
            // Update or create stats record
            GamePlayerStat::updateOrCreate(
                [
                    'game_id' => $gameId,
                    'player_id' => $playerId
                ],
                array_merge($stats, ['team_id' => $teamId, 'played' => $played])
            );
        }

     


}