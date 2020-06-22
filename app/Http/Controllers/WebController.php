<?php

namespace App\Http\Controllers;

use App\HelperClass\Date;
use App\Models\Customer;
use App\Models\News;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\User;
use App\Models\Store;
use App\Models\Slide;
use App\Models\Type_products;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function indexFrontEnd()
    {

        $products = Products::where("new",1)->where("status",2)->get();
        $cakeBirthday = Products::where("id_type",6)->where("status",2)->orderBy("new","ASC")->limit(5)->get();
        $giftBox = Products::where("id_type",10)->where("status",2)->orderBy("new","ASC")->limit(5)->get();
        $type_pd1 = Type_products::orderBy("id","ASC")->limit(4)->get();
        $slide1 = Slide::orderBy("id","ASC")->where("status",2)->get();
        $products1= Products::orderBy("id","ASC")->where("new",1)->where("status",2)->limit(6)->get();
        $drinks = Products::orderBy("id","ASC")->where("id_type",9)->where("new",1)->where("status",2)->limit(6)->get();
        $news = News::orderBy("created_at","DESC")->where("status",2)->limit(3)->get();
        return view("frontend.index",compact("type_pd1","products","slide1","products1","drinks","cakeBirthday","giftBox","news"));
    }
    public function index()
    {
        $orderWaiting = Orders::where("status",0)->orderBy("created_at","ASC")->limit(8)->get();
        $orderShip = Orders::where("status",2)->orderBy("updated_at","ASC")->limit(8)->get();
        $productNews =Products::where("new",1)->limit(8)->get();
        $totalProducts = Products::where("status",2)->get();
        $totalNews = News::all();
        $totalStore = Store::all();
        $totalMember = Customer::all();
        return view('backend.index',[
            "orderWaiting"=>$orderWaiting,
            "orderShip"=>$orderShip,
            "productNews"=>$productNews,
            "totalProducts"=>$totalProducts,
            "totalNews"=>$totalNews,
            "totalStore"=>$totalStore,
            "totalMember"=>$totalMember
        ]);
    }

    public function loginAdmin()
    {
        return view("backend.dang-nhap");
    }
    public function postLoginAdmin(Request $request)
    {
        if (Auth::attempt(["email"=>$request->__get("email"),"password"=>$request->__get("password")])){
            return redirect()->route("admin");
        }else{
            return redirect()->back()->with("error","Tài Khoản,mật khẩu Không Chính Xác");
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
    public function typeProduct(Type_products $type_products)
    {
        $type_pd = Type_products::all();
        $product = $type_products->Products()->where("status",2)->paginate(15);
        return view("frontend.product",compact("product","type_pd"));
    }

    public function productDetail(Products $product)
    {
//        dd($product);
        $similar_product = Products::where("id_type",$product->id_type)->where("new",1)->limit(4)->get();
        $pro_detail = Products::where("slug",$product->slug)->first();
//        dd($pro_detail);
        return view("frontend.product_detail",compact("pro_detail","similar_product"));
    }

    public function listStore()
    {
        $store = Store::orderBy("area","ASC")->get();
        return view("frontend.list-store",compact("store"));
    }

    public function getNews()
    {
        $new = News::where("status",2)->orderby("created_at","DESC")->paginate(10);
        return view("frontend.new.list-new",compact("new"));
    }
    public function getDetailNews(News $new)
    {
        $new = News::findOrFail($new->id);
        return view("frontend.new.new-detail",compact("new"));
    }

    //tim kiem san pham theo ten
    public function searchProduct(Request $request)
    {
        $stk = $request->stk;
        $product = Products::where("product_name",'like','%'.$stk.'%')->get();
        return view("frontend.tk-pd",compact("product"));

    }
}
