<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'app',
        'apm',
        'email',
        'rfc',
        'home_address',
        'phone_number',
    ];
}
