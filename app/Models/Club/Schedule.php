<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Models\Club\PlayerSchedule;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'event_status',
        'cost',
        'type',
        'schedule_type',
        'team',
        'location',
        'regular_season_record',
        'playoff_record',
        'city',
        'date',
        'time',
        'date_from',
        'date_to',
        'timing_from',
        'timing_to',
        'purpose_detail',
        'opposing_schedule_id',
        'status',
    ];
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
     public function OpTeam()
    {
        return $this->belongsTo(Team::class,'opposing_team_id','id');
    }
    public function OpTeamList()
    {
        return $this->hasMany(Team::class,'id','opposing_team_id');
    }
    public function loc()
    {
        return $this->belongsTo(location::class,'location','id');
    }

     public function comingTeamPlayers()
    {
        return $this->hasMany(PlayerSchedule::class,'schedule_id','id')->where('type','yes'); // Check the `type` for "yes"
    }
    public function PlayersSchedule()
    {
        return $this->hasMany(PlayerSchedule::class,'schedule_id','id'); // Check the `type` for "yes"
    }
   
    protected $dates = ['deleted_at'];
}
