<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Slide;
use App\Models\Type_products;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function indexFrontEnd()
    {
        $products = Products::where("new",1)->where("status",2)->get();
        $type_pd1 = Type_products::orderBy("id","ASC")->limit(4)->get();
        $slide1 = Slide::orderBy("id","ASC")->where("status",2)->get();
        $products1= Products::orderBy("id","ASC")->where("new",1)->where("status",2)->limit(6)->get();
        $products2= Products::orderBy("id","ASC")->where("new",2)->where("status",2)->limit(6)->get();
        return view("frontend.index",compact("type_pd1","products","slide1","products1","products2"));
    }
    public function index()
    {
        return view('backend.index');
    }

    public function loginAdmin()
    {
        return view("backend.dang-nhap");
    }
    public function postLoginAdmin(Request $request)
    {
//        dd($request->all());
        if (Auth::attempt(["email"=>$request->__get("email"),"password"=>$request->__get("password")])){
            return redirect()->route("admin");
        }else{
            return redirect()->back()->with("error","Tài Khoản Không Chính Xác");
        }
    }

    public function logoutAdmin()
    {
        Auth::logout();
        return redirect()->route("login-admin");
    }

    public function register()
    {
        return view("backend.dang-ky");
    }
    public function registerSave(Request $request)
    {
//        dd($request->all());
        $request->validate(
            [
                "user_name"=>"required|min:4",
                "email"=>"required|unique:users",
                "password"=>"required",
                "password_confirm"=>"required|same:password"
            ], [
                "user_name.required"=>"Tên Người Dùng Không Được Để Trống...",
                "user_name.min"=>"Tên Người Dùng Phải Bắt Đầu Từ 4 Ký Tự Trở Lên...",
                "email.required"=>"Email Không Được Để Trống..",
                "email.unique"=>"Email Đã Tồn Tại...",
                "password.required"=>"Mật Khẩu Không Được Để Trống...",
                "password_confirm.required"=>"Nhập Lại Mật Khẩu Không Được Bỏ Trống...",
                "password_confirm.same"=>"Nhập Lại Mật Khẩu Không Đúng..."
        ]);
        try {
            User::create([
                "user_name"=>$request->get("user_name"),
                "email"=>$request->get("email"),
                "password"=>bcrypt($request->get("password"))
            ]);
        }catch (\Exception $exception)
        {
            return redirect()->back()->with("error","Đăng Ký Tài Khoản Không Thành Công..");
        }
        return redirect()->route("login-admin")->with("thong_bao","Đăng Ký Tài Khoản Thành Công..");

    }
}
