<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order_detail;
use App\Models\Orders;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;

class CustomerAcController extends Controller
{
    public function getLogin()
    {
        return view("frontend.ac_customer.login");
    }
    public function postLogin(Request $request)
    {
//        dd($request->all());
//        $cus = Customer::all();
//        dd($cus->all());
        $login = Auth::guard('cus')->attempt(["email"=>$request->__get("email"),"password"=>$request->__get("password")]);
//        dd($login);
        if ($login){
            return redirect()->route("trang-chu");
        }
        return redirect()->back()->with("thong_bao","Đăng nhập thất bại..");
    }

    public function getRegister()
    {
        return view("frontend.ac_customer.register");
    }
    public function saveRegister(Request $request)
    {
       $request->validate([
           "customer_name"=>"required",
           "email"=>"required|unique:customer",
           "password"=>"required|min:6",
           "password_confirm"=>"required|same:password"
       ],[
           "customer_name.required"=>"Tên không được để trống..",
           "email.required"=>"Email không được để trống..",
           "email.unique"=>"Email đã tồn tại",
           "password.required"=>"Mật khẩu không được để trống..",
           "password.min"=>"Mật khẩu phải từ 6 ký tự trở lên",
           "password_confirm.required"=>"Nhập lại mật khẩu không được để trống..",
           "password_confirm.same"=>"Nhập lại mật khẩu không đúng..",
       ]);
        try {
            Customer::create([
                "customer_name"=>$request->get("customer_name"),
                "email"=>$request->get("email"),
                "password"=>bcrypt($request->get("password"))
            ]);
        }catch (\Exception $exception)
        {

        }
       return redirect()->route("customer.login");
    }

    public function logout()
    {
        Auth::guard("cus")->logout();
        return redirect()->route("trang-chu");
    }

    public function getDonMua(Customer $customer)
    {
        $id = $customer->__get("id");
        $order = Orders::where("customer_id",$id)->orderby("status","ASC")->get();
//        $order_complete = Orders::where("customer_id",$id)->where("status",3)->get();

        return view("frontend.ac_customer.order.donmua",compact("order"));
    }
    public function chiTietDonMua(Orders $order_detail)
    {
        $id = $order_detail->id;
        $id_cus = Orders::where("id",$id)->first();
//        dd($id_cus->customer_id);
        $order = Orders::where("customer_id",$id_cus->customer_id)->orderby("status","ASC")->get();
        $orderby = Order_detail::where("id_order",$id)->get();

        return view("frontend.ac_customer.order.ajax",compact("orderby","order"));
    }

    public function getChoXacNhan(Customer $customer)
    {
        $id = $customer->__get("id");
        $order = Orders::where("customer_id",$id)->where("status",0)->orderby("status","ASC")->get();
        return view("frontend.ac_customer.order.ajax-dangcho",compact("order"));
    }
    public function getHoanThanh(Customer $customer)
    {
        $id = $customer->__get("id");
        $order = Orders::where("customer_id",$id)->where("status",3)->orderby("status","ASC")->get();
        return view("frontend.ac_customer.order.ajax-hoanthanh",compact("order"));
    }
    public function getTatCa(Customer $customer)
    {
        $id = $customer->__get("id");
        $order = Orders::where("customer_id",$id)->orderby("status","ASC")->get();
//        $order_complete = Orders::where("customer_id",$id)->where("status",3)->get();

        return view("frontend.ac_customer.order.ajax-all",compact("order"));
    }
    public function getDangGiao(Customer $customer)
    {
        $id = $customer->__get("id");
        $order = Orders::where("customer_id",$id)->where("status",2)->get();
        return view("frontend.ac_customer.order.ajax-all",compact("order"));
    }
    public function getLayHang(Customer $customer)
    {
        $id = $customer->__get("id");
        $order = Orders::where("customer_id",$id)->where("status",1)->get();
        return view("frontend.ac_customer.order.ajax-all",compact("order"));
    }
    public function getDaHuy(Customer $customer)
    {
        $id = $customer->__get("id");
        $order = Orders::where("customer_id",$id)->where("status",4)->get();
//        $order_complete = Orders::where("customer_id",$id)->where("status",3)->get();

        return view("frontend.ac_customer.order.ajax-all",compact("order"));
    }
    public function updateHuyDon($id,Request $request)
    {
//        dd($request->all());
      $or = Orders::findOrFail($id);
      $id2 = $or->__get("customer_id");
      $or->status = request()->status;
      $or->save();
        $order = Orders::where("customer_id",$id)->orderby("status","ASC")->get();
        return view("frontend.ac_customer.order.ajax-all",compact("order"));


    }
    public function getProfile(Customer $customer)
    {
        $id = $customer->__get("id");
        $customer = Customer::where("id",$id)->first();
        return view("frontend.ac_customer.order.ajax-profile",compact("customer"));
    }

    public function updateProfile(Request $request,Customer $customer)
    {
        $cus = Customer::findOrFail($customer->id);
//        dd($cus);
        $random = Str::random(4);
        $image = "";
        if ($request->hasFile("image"))
        {
            $file = $request->image;
            $extName = $file->getClientOriginalExtension();
            if ($extName != "png" && $extName != "jpg" && $extName != "jpeg" && $extName != "gif")
            {
                return redirect()->back()->with("thong_bao","File avatar không hợp lệ..");
            }
            if (!is_null($cus->__get("image"))){
                unlink($cus->__get("image"));
            }
            $fileName = $file->getClientOriginalName();
            $fileImage = $random."_".$fileName;
            $file->move(public_path("upload/account"),$fileImage);
            $image = "upload/account/".$fileImage;
//            $request->merge(["image2" => $image]);
        }else{
            $image = $cus->__get("image");
//            $request->merge(["image2" => $image]);
        }
        $cus->customer_name = $request->customer_name;
        $cus->address = $request->address;
        $cus->phone_number = $request->phone_number;
        $cus->image = $image;
        $cus->save();
        return redirect()->back();

    }
}
