<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Club\Player;
use App\Models\Club\PlayerMetaTeam;

class PlayerMetaAdministrator extends Model
{
    use HasFactory;
    protected $table = 'player_meta_administrators';
     protected $fillable = [
        'player_id','user_id','club_id'
    ];
    

     public function user()
    {
        return $this->belongsTo(User::class);
    }
      public function player()
    {
        return $this->belongsTo(Player::class);
    }

     public function teamMeta()
    {
        return $this->hasMany(PlayerMetaTeam::class,'player_id','player_id');
    }
    protected $dates = ['deleted_at'];
}
