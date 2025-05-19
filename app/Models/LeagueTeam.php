<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Club\Club;
use App\Models\Club\Team;
use App\Models\LeagueDivision;

class LeagueTeam extends Model
{
    use HasFactory;

    protected $table = 'league_teams';
    protected $fillable = [
        'league_id',
        'user_id',
        'team_id',
        'division',
        'status'
    ];

    public function league()
    {
        return $this->belongsTo(League::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function divisions()
    {
        return $this->belongsTo(LeagueDivision::class,'division','id');
    }
}