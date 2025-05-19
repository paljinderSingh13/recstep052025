<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'locations';
    protected $fillable = [
        'name',
        'address',
        'google_map_link',
        'sport_id',
        'status',
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
    public function sports()
    {
        return $this->belongsToMany(Sport::class, 'location_sports');
    }
}
