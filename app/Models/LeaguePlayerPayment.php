<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\location;

class LeaguePlayerPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'player_id', 'league_id', 'team_id', 'payment_status'
    ];
    
}
