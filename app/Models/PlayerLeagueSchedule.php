<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Models\Club\Player;

class PlayerLeagueSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'player_id',
        'type',
        'schedule_id',
        'team_id',
    ];
    public function team()
    {
        return $this->belongsTo(LeagueTeam::class);
    }
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
    
    protected $dates = ['deleted_at'];
}
