<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    protected $table = 'product_image';
    public $fillable = ['name_image','id_product'];
}
