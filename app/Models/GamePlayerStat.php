<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamePlayerStat extends Model
{
    use HasFactory;

    protected $table = 'game_player_stats';
    protected $fillable = [
        'game_id',
        'player_id',
        'team_id',
        'points',
        'rebounds',
        'assists',
        'steals',
        'blocks',
        'fouls',
        'field_goal_attempts',
        'field_goal_made',
        'three_point_attempts',
        'three_point_made',
        'played'
    ];
    
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
    
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    
}