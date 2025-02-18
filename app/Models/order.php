<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'total_price',
        'address',
        'cart_items',

    ] ;
}
