<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    public $fillable = ['order_name','gender','email','address','phone_number','note','total','payment','status'];
}
