<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'order_detail';
    public $fillable = ['id_product','id_order','quantity','price'];
}
