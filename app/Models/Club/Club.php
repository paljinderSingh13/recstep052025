<?php

namespace App\Models\Club;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $fillable = [ 'logo','user_id','name', 'address', 'city', 'state', 'country', 'postal_code', 'contact_name', 'phone', 'email'];
protected $dates = ['deleted_at'];
    
}
