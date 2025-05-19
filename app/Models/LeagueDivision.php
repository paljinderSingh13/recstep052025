<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\location;

class LeagueDivision extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','league_id'
    ];
    
}
