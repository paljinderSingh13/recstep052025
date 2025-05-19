<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaguePlayer extends Model
{
    
    protected $fillable = ['team_id',
        'league_team_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'phone',
        'date_of_birth',
        'address'];

    protected $casts = [
        'date_of_birth' => 'date'
    ];

    public function team()
    {
        return $this->belongsTo(LeagueTeam::class);
    }
}
