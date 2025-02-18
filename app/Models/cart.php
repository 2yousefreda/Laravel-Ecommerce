<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $fillable = [
        'product_Id',
        'product_Name',
        'product_Price',
        'quantity',
        'total_Price',
        'image_Path',
    ];
}
