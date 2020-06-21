<?php
namespace App\Helper;

class CartHelper
{
    public $items = [];
    public $total_quantity=0;
    public $total_price =0;
    public function __construct()
    {
        $this->items = session('cart') ? session('cart'):[];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantity();
    }

    public function add($product,$qty =1)
    {
        $item = [
          "id" => $product->id,
          "product_name" => $product->product_name,
          "price" => ($product->sale_price)>0 ? $product->sale_price : $product->price,
          "ma_sp" => $product->ma_sp,
          "product_avatar" => $product->product_avatar,
          "id" => $product->id,
          "qty" => $qty,
        ];
        if (isset($this->items[$product->id]))
        {
            $this->items[$product->id]['qty']+= $qty;
        }else{
            $this->items[$product->id] = $item;
        }
        session(['cart'=> $this->items]);
    }
    public function remove($id)
    {
        if (isset($this->items[$id]))
        {
            unset($this->items[$id]);
        }
        session(["cart"=>$this->items]);
    }

    public function update($id,$qty = 1)
    {
        if (isset($this->items[$id]))
        {
            $this->items[$id]['qty'] = $qty;
        }
        session(["cart"=>$this->items]);

    }

    public function clear()
    {
        session(['cart'=> '']);
    }
    private function get_total_price(){
        $t =0;
        foreach ($this->items as $value) {
            $t += $value['qty']*$value['price'];

        }
        return $t;
    }

    private function get_total_quantity()
    {
        $t = 0;
        foreach ($this->items as $item)
        {
            $t += $item['qty'];
        }
        return $t;
    }
}
?>
