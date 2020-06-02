<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type_products;
use File;
use Illuminate\Support\Str;

class TypePdController extends Controller
{
    public function index()
    {
        $type = Type_products::paginate(10);
        return view("backend.type_products.type_pd",compact('type'));
    }
    public function new()
    {
        return view("backend.type_products.new");
    }
    public function save(Request $request)
    {
        $random = Str::random(4);
        $request->validate([
            "name"=>"required|min:5|string",
            "description"=>"required|min:10|string",
            "image"=>"required",
        ],[
            "name.required"=>"Tên không được bỏ trống..",
            "name.min"=>"Tên phải từ 5 ký tự trở lên..",
            "description.required"=>"Mô tả không được bỏ trống..",
            "description.min"=>"Mô tả phải từ 10 ký tự trở lên..",
            "image.required"=>"Ảnh không được bỏ trống.."
        ]);
        $image = "";
        try {
            if ($request->hasFile("image")){
                $file = $request->__get("image");
                $extImage= $file->getClientOriginalExtension();
                if ($extImage != "png" && $extImage != "jpg" && $extImage != "jpeg" && $extImage != "gif")
                {
                    return redirect()->back()->with("thong_bao","File ảnh không hợp lệ...");
                }
                $fileName = $file->getClientOriginalName();
                $fileImage = $random."_".$fileName;
                While (file_exists("upload/type-pd/".$fileImage)){
                    $fileImage = $random."_".$fileName;
                }
                $file->move(public_path("upload/type-pd"),$fileImage);
                $image = "upload/type-pd/".$fileImage;
            }
            Type_products::create([
                "name"=>$request->get("name"),
                "description"=>$request->get("description"),
                "image"=>$image,
            ]);
        }catch (\Exception $exception)
        {
            return redirect()->back()->with("thong_bao","Thêm loại sản phẩm không thành công..");
        }
        return redirect()->to(route("type-products"))->with("thong_bao","Thêm loại sản phẩm không thành công...");
    }

    public function edit($id)
    {
        $type_pd= Type_products::findOrFail($id);
        return view("backend.type_products.edit",compact("type_pd"));
    }

    public function update($id,Request $request)
    {
        $type_pd = Type_products::findOrFail($id);
        $request->validate([
            "name"=>"required|min:5|string",
            "description"=>"required|min:10|string",

        ],[
            "name.required"=>"Tên không được bỏ trống..",
            "name.min"=>"Tên phải từ 5 ký tự trở lên..",
            "description.required"=>"Mô tả không được bỏ trống..",
            "description.min"=>"Mô tả phải từ 10 ký tự trở lên..",

        ]);

        $random = Str::random(4);
        $image = "";
        try {
            if ($request->hasFile("image")){
                $file = $request->__get("image");
                $extImage= $file->getClientOriginalExtension();
                if ($extImage != "png" && $extImage != "jpg" && $extImage != "jpeg" && $extImage != "gif")
                {
                    return redirect()->back()->with("thong_bao","File ảnh không hợp lệ...");
                }
                if (!is_null($type_pd->__get("image"))){
                    unlink($type_pd->__get("image"));
                }
                $fileName = $file->getClientOriginalName();
                $fileImage = $random."_".$fileName;
                While (file_exists("upload/type-pd/".$fileImage)){
                    $fileImage = $random."_".$fileName;
                }
                $file->move(public_path("upload/type-pd"),$fileImage);
                $image = "upload/type-pd/".$fileImage;

            }else{
                $image = $type_pd->__get("image");
            }
            $type_pd->name = $request->get("name");
            $type_pd->description = $request->get("description");
            $type_pd->image = $image;
            $type_pd->save();
        }catch (\Exception $exception)
        {
            return  redirect()->back();
        }
        return redirect()->to(route("type-products"))->with("thong_bao","Cập nhật loại sản phẩm thành công...");

    }

    public function delete($id)
    {
        $type_pd = Type_products::findOrFail($id);
        try {
            unlink($type_pd->__get("image"));
            $type_pd->delete();

        }catch (\Exception $exception)
        {
            return redirect()->back()->with("thong_bao","Xóa không thành công...");
        }
        return redirect()->route("type-products")->with("thong_bao","Xóa thành công...");
    }


}
