<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    public $fillable = ['product_name','product_description','product_avatar','price','sale_price','new','status','ingredient','id_type'];

    public function type_product()
    {
        return $this->belongsTo("App\Models\Type_products","id_type");
    }
    public function getPrice()
    {
        return number_format($this->__get("price"),2)."VNĐ";
    }
}
