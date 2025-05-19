<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomResetPassword;
use App\Models\Club\Team;
use App\Models\Club\TeamsTeamAdministrator;
use App\Models\Club\Club;
use App\Models\Message;
use Auth;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const ROLE_CLUB = 'club';
    const ROLE_TEAM = 'team';
    const ROLE_PLAYER = 'player';
    const ROLE_ADMINISTRATOR = 'administrator';
    const ROLE_MASTER = 'master';

    // Check if user has a specific role
    public function hasRole($role)
    {
        return $this->role === $role;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'last_name',
        'is_online',
        'phone',
        'dob',
        'profile_picture',
        'gender',
        'jersey_no',
        'dashboard_banner_1',
        'dashboard_banner_2',
        'password','role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function club()
    {
        return $this->belongsTo(Club::class,'id','user_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function teamadmin()
    {
        return $this->belongsTo(TeamsTeamAdministrator::class,'id','team_administrator_id');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }
    public function sender()
    {
        return $this->belongsTo(Message::class,'id', 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(Message::class,'id','receiver_id');
    }

    public function messagesCount()
    {
        return $this->hasMany(Message::class,'sender_id')->where('user_type','admin')->where('is_read','no')->where('receiver_id',Auth::id());
    }

     public function messagesTeamCount()
    {
        return $this->hasMany(Message::class,'sender_id')->where('user_type','team')->where('is_read','no');
    }

   

protected $dates = ['deleted_at'];
    
}
