<?php

// app/Http/Controllers/LeagueTeamController.php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\LeagueTeam;
use App\Models\LeaguePlayer;
use App\Models\LeaguePlayerPayment;
use App\Models\User;
use Illuminate\Http\Request;

class LeaguePlayerPaymentController extends Controller
{
    public function store($player_id,$team_id)
    {
       $league_id = session('league_id');
        try {
            // Check for existing payment
            if (LeaguePlayerPayment::where([
                'player_id' => $player_id,
                'league_id' => $league_id,
                'team_id' => $team_id
            ])->exists()) {
                return back()->with('error', 'Payment record already exists!');
            }

            // Create payment record
            LeaguePlayerPayment::create([
                'player_id' => $player_id,
                'league_id' => $league_id,
                'team_id' => $team_id,
                'payment_status' => 'paid'
            ]);

            return back()->with('success', 'Payment recorded successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'Error recording payment: ' . $e->getMessage());
        }
    }
    public function updateVerify($player_id,$team_id)
    {
       $league_id = session('league_id');
        try {
            
            // Create payment record
            LeaguePlayerPayment::where('league_id',$league_id)->where('player_id', $player_id)->where('team_id', $team_id)->update([
                'is_verified' => 'yes'
            ]);

            return back()->with('success', 'Payment verify recorded successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'Error recording payment: ' . $e->getMessage());
        }
    }
}