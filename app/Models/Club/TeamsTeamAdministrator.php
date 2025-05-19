<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamsTeamAdministrator extends Model
{
    use HasFactory;

    protected $table = 'teams_team_administrators';
     protected $fillable = [
        'team_id','user_id','team_administrator_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class,'team_id','id');
    }
}
