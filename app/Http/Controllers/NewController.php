<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use File;

class NewController extends Controller
{
    public function index()
    {
        $news = News::paginate(15);
        return view("backend.news.news",compact('news'));
    }

    public function type($id)
    {
        $new = News::findOrFail($id);
        return view("backend.news.detail",compact("new"));
    }
    public function new()
    {
        return view("backend.news.new");
    }


    public function save(Request $request)
    {
//        dd($request->all());
        $random = Str::random(4);
        $request->validate(
            [
             "new_title" =>"required|min:3|string",
             "new_content"=>"required|min:10|string",
                "image"=>"required"
            ],
            [
                "new_title.required"=>"Tiêu đề không được để trống...",
                "new_title.min"=>"Tiêu đề phải từ 3 ký tuwk trở lên....",
                "new_content.required"=>"Nội dung không được để trống....",
                "new_content.min"=>"Nội dung  phải từ 10 ký tự trở lên...",
                "image.required"=>"Ảnh không được để trống...."
        ]);
        $image = "";
        try {
            if ($request->hasFile("image"))
            {
                $file = $request->file("image");
                $extName = $file->getClientOriginalExtension();
                if ($extName != "png" && $extName != "jpg" && $extName != "jpeg" && $extName != "gif"){
                    return redirect()->back()->with("thong_bao","Đuôi file không hợp lệ..");
                }
                $fileName = $file->getClientOriginalName();
                $fileImage = $random."_".$fileName;
                while (file_exists("upload/news".$fileImage)){
                    $fileImage = $random."_".$fileName;
                }
                $file->move(public_path("upload/news"),$fileImage);
                $image = "upload/news/".$fileImage;
            }

            News::create([
                "new_title"=>$request->get("new_title"),
                "new_content"=>$request->get("new_content"),
                "image"=>$image,
                "status"=>$request->get("status")
            ]);
        }catch (\Exception $exception)
        {
            return redirect()->back();
        }
        return redirect()->to(route("news"))->with("thong_bao","Thêm tin tức thành công...");

    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('backend.news.edit',compact('news'));
    }
    public function update($id,Request $request)
    {
        $news = News::findOrFail($id);
        $random = Str::random(4);

        $request->validate([
            "new_title" =>"required|min:3|string",
            "new_content"=>"required|min:10|string",
        ],[
            "new_title.required"=>"Tiêu đề không được để trống...",
            "new_title.min"=>"Tiêu đề phải từ 3 ký tuwk trở lên....",
            "new_content.required"=>"Nội dung không được để trống....",
            "new_content.min"=>"Nội dung  phải từ 10 ký tự trở lên...",
        ]);
        if ($request->hasFile("image"))
        {
            $file = $request->file("image");
            $extName = $file->getClientOriginalExtension();
            if ($extName != "png" && $extName != "jpg" && $extName != "jpeg" && $extName != "gif"){
                return redirect()->back()->with("thong_bao","Đuôi file không hợp lệ..");
            }
            if (!is_null($news->__get("image"))){
                unlink($news->__get("image"));
            }
            $fileName = $file->getClientOriginalName();
            $fileImage = $random."_".$fileName;
            while (file_exists("upload/news".$fileImage)){
                $fileImage = $random."_".$fileName;
            }
            $file->move(public_path("upload/news"),$fileImage);
            $image = "upload/news/".$fileImage;
        }else{
            $image = $news->__get("image");
        }
        try {

            $news->new_title= $request->get("new_title");
            $news->new_content= $request->get("new_content");
            $news->status= $request->get("status");
            $news->image = $image;
            $news->save();


        }catch (\Exception $exception)
        {
            return redirect()->back();
        }
        return redirect()->to(route("news"))->with("thong_bao","Cập nhật thành công...");

    }

    public function delete($id)
    {
        $news = News::findOrFail($id);
        try {
            unlink($news->__get("image"));
            $news->delete();

        }catch (\Exception $exception)
        {
            return redirect()->back();
        }
        return redirect()->to(route('news'))->with("thong_bao","Xóa tin tức thành công...");
    }
}
