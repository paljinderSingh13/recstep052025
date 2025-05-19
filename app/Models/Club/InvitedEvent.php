<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Models\Club\PlayerSchedule;

class InvitedEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'schedule_id',
        'player_id',
    ];
    
    protected $dates = ['deleted_at'];
}
