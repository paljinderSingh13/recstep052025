<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Club\PlayerMetaTeam;
use App\Models\User;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','club_id','password', 'picture', 'name', 'type', 'priority', 'dob', 'proof_id', 'phone', 'email', 'status',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function teamMeta()
    {
        return $this->hasMany(PlayerMetaTeam::class,'player_id','id');
    }

    public function administrator()
    {
        return $this->hasMany(PlayerMetaAdministrator::class,'player_id','id');
    }
    
    
    protected $dates = ['deleted_at'];
}
