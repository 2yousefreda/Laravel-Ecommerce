<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'description',
        'imagepath',
        'category_id',
    ] ;
}
