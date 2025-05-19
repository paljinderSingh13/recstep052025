<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Club\Team;
use App\Models\User;


class PlayerMetaTeam extends Model
{
    use HasFactory;
    protected $table = 'player_meta_teams';
     protected $fillable = [
        'player_id','user_id','team_id',
    ];

     public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $dates = ['deleted_at'];
    
}
