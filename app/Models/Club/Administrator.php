<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Club\TeamsTeamAdministrator;
use App\Models\User;

class Administrator extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_id',
        'user_id',
        'name',
        'type',
        'phone',
        'email',
        'status',
    ];

    public function teamAdmin()
    {
        return $this->belongsTo(Team::class,'team_id','id');
    }

     public function teamAdminMeta()
    {
        return $this->hasMany(TeamsTeamAdministrator::class,'team_administrator_id','id');
    }
     public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    protected $dates = ['deleted_at'];

}
