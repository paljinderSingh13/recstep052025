<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
   use HasFactory;
    protected $fillable = [
        'club_id',
        'name',
        'logo',
        'flag',
        'age_group',
        'season',
        'team_unique_id',
        'password',
        'status',
    ];


    public function players()
    {
        return $this->hasMany(PlayerMetaTeam::class,'team_id','id');
    }

     public function club()
    {
        return $this->belongsTo(Club::class);
    }

    protected $dates = ['deleted_at'];
}
