<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\leagueTeam;


class PlayerMetaLeagueTeam extends Model
{
    use HasFactory;
    protected $table = 'player_meta_league_teams';
     protected $fillable = [
        'player_id','user_id','team_id',
    ];

     public function team()
    {
        return $this->belongsTo(LeagueTeam::class);
    }

    protected $dates = ['deleted_at'];
    
}
