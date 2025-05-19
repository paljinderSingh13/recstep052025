<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeagueReferee extends Model
{
    use HasFactory;

    protected $table = 'league_referees';
     protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'league_id',
        'badge_id',
        'region'
    ];

    
}