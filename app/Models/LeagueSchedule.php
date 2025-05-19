<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PlayerSchedule;
use App\Models\LeagueTeam;
use App\Models\LeagueField;
use App\Models\Club\Team;
use App\Models\Location;
use App\Models\LeagueDivision;

class LeagueSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'league_id',
        'location_id',
        'date',
        'start_time',
        'duration',
        'game_type',
        'division_id',
        'home_team_id',
        'away_team_id',
        'away_team_score',
        'away_team_status',
        'away_team_report',
        'home_team_score',
        'home_team_status',
        'home_team_report',
        'notes'
    ];
    public function team()
    {
        return $this->belongsTo(LeagueTeam::class);
    }
     public function OpTeam()
    {
        return $this->belongsTo(LeagueTeam::class,'opposing_team_id','id');
    }
    public function OpTeamList()
    {
        return $this->hasMany(LeagueTeam::class,'id','opposing_team_id');
    }
    // public function loc()
    // {
    //     return $this->belongsTo(location::class,'location','id');
    // }

     public function comingTeamPlayers()
    {
        return $this->hasMany(PlayerSchedule::class,'schedule_id','id')->where('type','yes'); // Check the `type` for "yes"
    }
    public function PlayersSchedule()
    {
        return $this->hasMany(PlayerSchedule::class,'schedule_id','id'); // Check the `type` for "yes"
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function leaguefieldlocation()
    {
        return $this->belongsTo(LeagueField::class,'location_id');
    }

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function division()
    {
        return $this->belongsTo(LeagueDivision::class);
    }

    public function gameReferees()
    {
        return $this->hasMany(GameReferee::class,'game_id','id');
    }
   
    protected $dates = ['deleted_at'];
}
