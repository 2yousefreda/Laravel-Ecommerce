<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'imagepath',
        'category_id',
        'description',
    ];
}
