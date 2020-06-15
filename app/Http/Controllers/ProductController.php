<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Type_products;
use App\Models\Product_image;
use Illuminate\Support\Str;
use File;

class ProductController extends Controller
{
    public function timkiem(Request $request)
    {
//        dd($request->all());
        $status = $request->status;
//        $name = $request->product_name;
        $type_pd = $request->id_type;
        $product = Products::where("status",$status)->where("id_type",$type_pd)->paginate(15);
        $type_pd = Type_products::all();
        return view("backend.products.products",compact("product"));

    }
    public function index()
    {
        $product = Products::paginate(15);
        $type_pd = Type_products::all();
        return view("backend.products.products",compact("product"));
    }
    public function new()
    {
        $type_pd = Type_products::all();
        return view("backend.products.new",compact("type_pd"));
    }

    public function save(Request $request)
    {

        $random = Str::random(4);
//dd($request->all());
        $request->validate([
            "product_name"=>"required|min:5|string",
            "ma_sp"=>"required",
            "product_description"=>"required",
            "ingredient"=>"required",
            "product_avatar"=>"required",
            "price"=>"required|numeric|min:0",

        ],
        [
            "product_name.required"=>"Tên sản phẩm không được để trống...",
            "product_name.min"=>"Tên sản phẩm phải từ 5 ký tự trở lên...",
            "product_name.string"=>"Tên sản phẩm phải là một chuỗi...",
            "product_description.required"=>"Mô tả sản phẩm không được để trống",
            "ingredient.required"=>"Thành phần không được để trống..",
            "ma_sp.required"=>"Ma sản phẩm không được để trống",
            "product_avatar.required"=>"Ảnh sản phẩm không được để trống...",
            "price.required"=>"Giá không được để trống..",
            "price.numeric"=>"Giá phải là kiểu số nguyên..",
            "price.min"=>"Giá không được để là 0",


        ]);
        if ($request->__get("sale_price")>$request->__get("price")){
            return redirect()->back()->with("thong_bao","Giá khuyến mại phải nhỏ hơn giá sản phẩm");
        }
        $image = "";
        try {
            if ($request->hasFile("product_avatar"))
            {
                $file = $request->product_avatar;
                $extName = $file->getClientOriginalExtension();
                if ($extName != "png" && $extName != "jpg" && $extName != "jpeg" && $extName != "gif")
                {
                    return redirect()->back()->with("thong_bao","File avatar không hợp lệ..");
                }
                $fileName = $file->getClientOriginalName();
                $fileImage = $random."_".$fileName;
                $file->move(public_path("upload/product"),$fileImage);
                $image = "upload/product/".$fileImage;
            }
            $slug = \Illuminate\Support\Str::slug($request->get("product_name"));
            $product=Products::create([
                "product_name"=>$request->get("product_name"),
                "product_description"=>$request->get("product_description"),
                "price"=>$request->get("price"),
                "ma_sp"=>$request->get("ma_sp"),
                "sale_price"=>$request->get("sale_price"),
                "new"=>$request->get("new"),
                "status"=>$request->get("status"),
                "ingredient"=>$request->get("ingredient"),
                "id_type"=>$request->get("id_type"),
                "product_avatar"=>$image
            ]);
            $id=$product->id;
            $slug1 = $slug.$id;
            $pd = Products::findOrFail($id);
            $pd->slug = $slug1;
            $pd->save();

            if ($request->hasFile("name_image")) {
                foreach ($request->name_image as $value) {
                    $extName2 = $value->getClientOriginalExtension();
                    if ($extName2 != "png" && $extName2 != "jpg" && $extName2 != "jpeg" && $extName2 != "gif") {
                        return redirect()->back()->with("thong_bao", "File ảnh sản phẩm không hợp lệ..");
                    }
                    $imageName = $value->getClientOriginalName();
                    $filePdImg = $random . "_" . $imageName;
                    $value->move(public_path("upload/product"), $filePdImg);
                    $link = "upload/product/" . $filePdImg;
                    Product_image::create([
                        "name_image" => $link,
                        "id_product" => $product->__get("id"),
                        "status" => $request->get("status")
                    ]);

                }
            }

        }catch (\Exception $exception)
        {
            return redirect()->back();
        }
        return redirect()->route("products")->with("thong_bao","Thêm sản phẩm thành công...");
    }


    public function edit($id)
    {
        $type_pd = Type_products::all();
        $product = Products::findOrFail($id);
        return view("backend.products.edit-pd",compact("product","type_pd"));
    }
    public function update($id,Request $request)
    {
        $pro = Products::findOrFail($id);

        $request->validate([
            "product_name"=>"required|min:2|string",
//            "product_description"=>"required|min:10",
            "price"=>"required|numeric|min:0",
//            "sale_price"=>"numeric",

        ],
            [
                "product_name.required"=>"Tên sản phẩm không được để trống...",
                "product_name.min"=>"Tên sản phẩm phải từ 5 ký tự trở lên...",
                "product_name.string"=>"Tên sản phẩm phải là một chuỗi...",
//                "product_description.required"=>"Mô tả sản phẩm không được để trống...",
//                "product_description.min"=>"Mô tả sản phẩm phải từ 10 ký tự trở lên...",
                "price.required"=>"Giá không được để trống..",
                "price.numeric"=>"Giá phải là kiểu số nguyên..",
                "price.min"=>"Giá không được để là 0",
//                "sale_price.numeric"=>"Giá khuyến mại phải là kiểu số nguyên...",

            ]);
        $random = Str::random(4);
        $image = "";


        try {
            if ($request->hasFile("product_avatar"))
            {
                $file = $request->product_avatar;
                $extName = $file->getClientOriginalExtension();
                if ($extName != "png" && $extName != "jpg" && $extName != "jpeg" && $extName != "gif")
                {
                    return redirect()->back()->with("thong_bao","File avatar không hợp lệ..");
                }
                if (!is_null($pro->__get("product_avatar"))){
                    unlink($pro->__get("product_avatar"));
                }
                $fileName = $file->getClientOriginalName();
                $fileImage = $random."_".$fileName;
                $file->move(public_path("upload/product"),$fileImage);
                $image = "upload/product/".$fileImage;
            }else{
                $image = $pro->__get("product_avatar");
            }

                $pro->product_name=$request->get("product_name");
                $pro->ma_sp = $request->get("ma_sp");
                $pro->product_description=$request->get("product_description");
                $pro->price=$request->get("price");
                $pro->sale_price=$request->get("sale_price");
                $pro->new=$request->get("new");
                $pro->status=$request->get("status");
                $pro->ingredient=$request->get("ingredient");
                $pro->id_type=$request->get("id_type");
                $pro->product_avatar=$image;
            $slug = \Illuminate\Support\Str::slug($request->get("product_name"));
//            dd($slug);
            $pro->slug = $slug.$id;
                $pro->save();


            if ($request->hasFile("name_image")) {
                foreach ($request->name_image as $value) {
                    $extName2 = $value->getClientOriginalExtension();
                    if ($extName2 != "png" && $extName2 != "jpg" && $extName2 != "jpeg" && $extName2 != "gif") {
                        return redirect()->back()->with("thong_bao", "File ảnh sản phẩm không hợp lệ..");
                    }

                    $imageName = $value->getClientOriginalName();
                    $filePdImg = $random . "_" . $imageName;
                    $value->move(public_path("upload/product"), $filePdImg);
                    $link = "upload/product/" . $filePdImg;
                    Product_image::create([
                        "name_image" => $link,
                        "id_product" => $pro->__get("id"),
                        "status" => $request->get("status")
                    ]);

                }
            }

        }catch (\Exception $exception)
        {
            return redirect()->back();
        }
        return redirect()->route("products")->with("thong_bao","Cập nhật sản phẩm thành công...");
    }

    public function delete($id)
    {
        $product = Products::findOrFail($id);
        $pd_image = Product_image::where("id_product",$id)->get();



        try {
            foreach ($pd_image as $value){
                unlink($value->__get("name_image"));
            }
            Product_image::where("id_product",$id)->delete();
            $product->delete();
            unlink($product->__get("product_avatar"));


        }catch (\Exception $exception)
        {
            return redirect()->route("products");
        }
        return redirect()->route("products")->with("thong_bao","Xóa sản phẩm thành công...");
    }

    public function check($id)
    {
        $product = Products::findOrFail($id);
        $pd_image = Product_image::where("id_product",$id)->get();
        return view("backend.products.check",compact("product","pd_image"));
    }


    public function deleteImg($id)
    {

        $imgPd = Product_image::findOrFail($id);
        $id_type = $imgPd->__get("id_product");
//        dd($imgPd->__get("id_product"));
        try {
            $imgPd->delete();
            unlink($imgPd->__get("name_image"));

        }catch (\Exception $exception)
        {
            return redirect()->back();
        }
        return redirect("admin/product/check/".$id_type)->with("thong_bao","Xóa ảnh thành công");
    }
}
