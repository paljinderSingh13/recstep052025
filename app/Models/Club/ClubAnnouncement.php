<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class ClubAnnouncement extends Model
{
   
    use HasFactory;
    protected $fillable = [
        'club_id',
        'user_id',
        'announcements',
        'status'
    ];
protected $dates = ['deleted_at'];

 public function user()
    {
        return $this->belongsTo(User::class);
    }
}
