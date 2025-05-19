<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameReferee extends Model
{
    use HasFactory;

    protected $table = 'game_referees';
     protected $fillable = [
        'game_id', 'user_id', 'position_id','assigned_by','league_id','assigned_at'
    ];


    public function referees()
    {
        return $this->belongsTo(LeagueReferee::class,'user_id','id');
    }
    public function game()
    {
        return $this->belongsTo(LeagueReferee::class,'game_id','id');
    }

    // User.php
    public function assignedGames()
    {
        return $this->belongsToMany(Game::class, 'game_referee')
                    ->withPivot('position_id', 'assigned_by', 'assigned_at')
                    ->withTimestamps();
    }

    public function leagueReferee()
    {
        return $this->belongsTo(LeagueReferee::class,'user_id');
    }

    public function position()
    {
        return $this->belongsTo(LeagueRefereePosition::class);
    }
    
}