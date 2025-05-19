<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeagueGame extends Model
{
    use HasFactory;

     protected $fillable = [
        'game_date',
        'game_time',
        'field_id',
        'game_type',
        'duration_minutes',
        'division',
        'home_team_id',
        'away_team_id',
        'notes'
    ];

    protected $casts = [
        'game_date' => 'date',
    ];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }
}