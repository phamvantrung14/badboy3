<?php

namespace App\Http\Controllers;
use App\Helper\CartHelper;
use App\Models\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
//        $this->middleware('cus');
    }

    public function view()
    {
        return view("frontend.cart.cart");
    }
    public function add(CartHelper $cart,Products $products)
    {
        $id = $products->__get("id");
        $product = Products::find($id);
        $cart->add($product);
//        dd(session('cart'));
        return redirect()->back();
    }
    public function remove(CartHelper $cart,$id)
    {
        $cart->remove($id);
        return redirect()->back();
    }
    public function update(CartHelper $cart,$id)
    {
        $qty = request()->qty ? request()->qty : 1;
        $cart->update($id,$qty);
        return redirect()->back();
    }
    public function clear(CartHelper $cart)
    {
        $cart->clear();
        return redirect()->back();
    }
}
