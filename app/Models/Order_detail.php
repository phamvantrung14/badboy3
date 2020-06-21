<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'order_detail';
    public $fillable = ['id_product','id_order','quantity','price'];
    public function Order()
    {
        return $this->belongsTo("\App\Models\Orders","id_order");
    }
    public function Product()
    {
        return $this->belongsTo("\App\Models\Products","id_product");
    }
    public function getPrice()
    {
        return number_format($this->__get("price"))." VNĐ";
    }
}
