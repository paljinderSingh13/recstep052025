<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Models\Club\Player;

class PlayerSchedule extends Model
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
        return $this->belongsTo(Team::class);
    }
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
    
    protected $dates = ['deleted_at'];
}
