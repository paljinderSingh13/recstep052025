<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Club\Team;

class Message extends Model
{
    protected $fillable = ['sender_id', 'receiver_id', 'message','type','user_type','user_id','type','is_read'];

     public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
      public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

       public function team()
    {
        return $this->belongsTo(Team::class, 'user_id');
    }

    
}
