<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    public function store()
    {
        $hanoi = Store::where('area',1)->get();
        $hcm = Store::where('area',2)->get();
        $danang = Store::where('area',3)->get();
        $kvk = Store::where('area',4)->get();
        $store = Store::paginate(10);
        return view('backend.store.store',compact('store','hanoi','hcm','danang','kvk'));
    }

    public function newStore()
    {
        return view('backend.store.new-store');
    }

    public function saveStore(Request $request)
    {
        $request->validate([
            "store_name"=>"required|min:6|string",
            "address"=>"required|string",
            "phone"=>"required"
        ],[
            "store_name.required"=>"Tên cửa hàng không được để trống...",
            "store_name.min"=>"Tên cửa hàng phải từ 6 ký tự trở lên",
            "store_name.string"=>"Tên cửa hàng phải là keeir chuỗi",
            "address.required"=>"Địa chỉ cửa hàng không được để trống",
            "address.string"=>"Địa chỉ cửa hàng phải là kiểu chuỗi",
            "phone.required"=>"SĐT không được để trống..."
        ]);
//dd($request->all());
        try {
          Store::create([
                "area"=>$request->get("area"),
                "store_name"=>$request->get("store_name"),
                "address"=>$request->get("address"),
                "phone"=>$request->get("phone")
            ]);
        }catch (\Exception $exception){
            return redirect()->to("admin/store/new");

        }
        return redirect()->to("admin/store")->with("thong_bao","Thêm sản phẩm thành công...");
    }

    public function edit($id)
    {
        $store = Store::findOrFail($id);

        return view("backend.store.edit",compact('store'));
    }

    public function update($id,Request $request)
    {
        $store = Store::findOrFail($id);
        $request->validate([
            "store_name"=>"required|min:6|string",
            "address"=>"required|string",
            "phone"=>"required"
        ],[
            "store_name.required"=>"Tên cửa hàng không được để trống...",
            "store_name.min"=>"Tên cửa hàng phải từ 6 ký tự trở lên",
            "store_name.string"=>"Tên cửa hàng phải là keeir chuỗi",
            "address.required"=>"Địa chỉ cửa hàng không được để trống",
            "address.string"=>"Địa chỉ cửa hàng phải là kiểu chuỗi",
            "phone.required"=>"SĐT không được để trống..."
        ]);
//dd($request->area);
        try {

            $store->area = $request->area;
            $store->store_name = $request->store_name;
            $store->address = $request->address;
            $store->phone = $request->phone;

            $store->save();

        }catch (\Exception $exception)
        {
            return redirect()->back();
        }
        return redirect()->to("admin/store")->with("thong_bao","Cập nhật thành công...");
    }

    public function delete($id)
    {
        $store = Store::findOrFail($id);
        try {
            $store->delete();

        }catch (\Exception $exception)
        {
            return redirect()->back();
        }
        return redirect()->to("admin/store")->with("thong_bao","Xóa thành công...");
    }









    //tìm kiếm theo khu vực
    public function tkHn(Request $request){
        $hanoi = Store::where('area',1)->get();
        $hcm = Store::where('area',2)->get();
        $danang = Store::where('area',3)->get();
        $kvk = Store::where('area',4)->get();
        $store = Store::where('area',$request->area)->paginate(10);
        return view('backend.store.store',compact('store','hanoi','hcm','danang','kvk'));
    }
    public function tkDn(Request $request)
    {
        $hanoi = Store::where('area',1)->get();
        $hcm = Store::where('area',2)->get();
        $danang = Store::where('area',3)->get();
        $kvk = Store::where('area',4)->get();
        $store = Store::where('area',$request->area)->paginate(10);
        return view('backend.store.store',compact('store','hanoi','hcm','danang','kvk'));
    }
    public function tkHcm(Request $request)
    {
        $hanoi = Store::where('area',1)->get();
        $hcm = Store::where('area',2)->get();
        $danang = Store::where('area',3)->get();
        $kvk = Store::where('area',4)->get();
        $store = Store::where('area',$request->area)->paginate(10);
        return view('backend.store.store',compact('store','hanoi','hcm','danang','kvk'));
    }
    public function tkKvk(Request $request)
    {
        $hanoi = Store::where('area',1)->get();
        $hcm = Store::where('area',2)->get();
        $danang = Store::where('area',3)->get();
        $kvk = Store::where('area',4)->get();
        $store = Store::where('area',$request->area)->paginate(10);
        return view('backend.store.store',compact('store','hanoi','hcm','danang','kvk'));
    }
}
