<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_products extends Model
{
    protected $table = 'type_products';
    public $fillable = ['name','description','image'];
}
