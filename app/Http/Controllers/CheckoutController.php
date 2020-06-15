<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use App\Models\Order_detail;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function form(CartHelper $cart)
    {
        if ($cart->items==[]){
            return redirect()->route("trang-chu");
        }else{
            return view("frontend.cart.checkout");

        }
    }
    public function submit_form(CartHelper $cart,Request $request)
    {
//        dd($request->all());
//        dd($cart);
        $request->validate([
            "order_name"=>"required|min:4",
            "email"=>"required",
            "phone_number"=>"required",
            "address"=>"required|min:4",
            "payment"=>"required"
        ],[
            "order_name.required"=>"Tên không được để trống..",
            "order_name.min"=>"Tên phải từ 3 ký tự trở lên..",
            "email.required"=>"Email không được để trống..",
            "phone_number.required"=>"Số điện thoại không được để trống..",

            "address.required"=>"Địa chỉ không được để trống..",
            "address.min"=>"Địa chỉ phải từ 4 ký tự..",
            "payment.required"=>"Hãy chọn hình thức thanh toán.."
        ]);
        $order = Orders::create([
            "order_name"=>$request->get("order_name"),
            "email"=>$request->get("email"),
            "gender"=>$request->get("gender"),
            "phone_number"=>$request->get("phone_number"),
            "address"=>$request->get("address"),
            "payment"=>$request->get("payment"),
            "note"=>$request->get("note"),
            "status"=>0,
            "total_price"=>$cart->total_price
        ]);
        foreach ($cart->items as $item)
        {


            Order_detail::create([
                "id_product"=>$item["id"],
                "id_order"=>$order->id,
                "price"=>$item["price"],
                "quantity"=>$item["qty"]
            ]);
        }
        $data=[
            "order_name"=>$request->get("order_name"),
            "email"=>$request->get("email")
        ];
        $email = [
          "trungpv398@gmail.com",
          $data["email"],
        ];
        Mail::send("frontend.cart.viewMail",$data,function ($mess)use ($data,$email){
            $mess->from("trungpv398@gmail.com");
            $mess->to($email,"frontend.cart.viewMail")->subject("Quý khách đặt hàng thành công");
        });
        session(["cart"=>[]]);
        return redirect()->route("trang-chu")->with("thong_bao","Đặt hàng thành công..");
    }
}
