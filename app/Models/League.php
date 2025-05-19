<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'name',
        'slug',
        'url',
        'sport',
        'sports',
        'type',
        'location',
        'time',
        'timezone',
        'user_id'
    ];

    protected $casts = [
        'time' => 'datetime:H:i',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}