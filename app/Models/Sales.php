<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected  $fillable = [
        'client_id',
        'product_id',
        'user_id',
        'category_id'
    ];

}
