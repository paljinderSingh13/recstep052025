<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeagueField extends Model
{
    use HasFactory;

    protected $table = 'league_fields';
     protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'league_id',
        'google_maps_embed'
    ];

    
}