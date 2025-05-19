<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMessage extends Model
{
    protected $fillable = ['sender_id', 'receiver_id','team_id','message_id','is_read'];

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

    
}
