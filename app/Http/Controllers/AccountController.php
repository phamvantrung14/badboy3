<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view("backend.account.account",compact("users"));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view("backend.account.edit",compact("user"));
    }
    public function update($id,Request $request)
    {
        $user = User::findOrFail($id);
        $random = Str::random(4);
        $request->validate(
            [
                "user_name"=>"required|min:3",
                "phone_number"=>"required|numeric",
                "address"=>"required",
                "image"=>"required"
            ],
        [
            "user_name.required"=>"Tên không được bỏ trống...",
            "user_name.min"=>"Tên phải tối thiểu 3 ký tự trở lên...",
            "phone_number.required"=>"SĐT không được bỏ trống...",
            "phone_number.numeric"=>"SĐT phải là kiểu số nguyên...",
            "address.required"=>"Địa chỉ không được bỏ trống...",
            "image.required"=>"Ảnh không được bỏ trống..."

        ]);
        $image = "";
        try {
            if ($request->hasFile("image")){
                $file = $request->__get("image");
                $extName = $file->getClientOriginalExtension();
                if ($extName != "png" && $extName != "jpg" && $extName != "jpeg" && $extName != "gif")
                {
                    return redirect()->back()->with("error","File không hợp lệ..");
                }
                if (!is_null($user->__get("image"))){
                    unlink($user->__get("image"));
                }
                $fileName = $file->getClientOriginalName();
                $fileImage = $random."_".$fileName;
                while (file_exists("upload/account".$fileImage)){
                    $fileImage = $random."_".$fileName;
                }
                $file->move(public_path("upload/account"),$fileImage);
                $image = "upload/account/".$fileImage;
            }else
            {
                $image = $user->__get("image");
            }
            $user->user_name= $request->get("user_name");
            $user->phone_number= $request->get("phone_number");
            $user->address= $request->get("address");
            $user->image= $image;
            $user->save();
        }catch (\Exception $exception)
        {
            return redirect()->back();
        }

        return redirect()->route("account")->with("thong_bao","Cập nhật thành công....");
    }
    public function editPas($id)
    {
        $user = User::findOrFail($id);
        return view("backend.account.edit_pas",compact("user"));

    }
    public function savePasNew($id,Request $request)
    {

        $user = User::findOrFail($id);
        $request->validate([
            "password_old"=>"required",
            "password"=>"required",
            "password_confirm"=>"required|same:password"
        ],
        [
            "password_old.required"=>"Mật Khẩu Cũ Không Được Để Trống...",
            "password.required"=>"Mật Khẩu Mới Không Được Để Trống...",
            "password_confirm.required"=>"Nhập Lại Mật Khẩu Chưa Được Nhập...",
            "password_confirm.same"=>"Mật Khẩu Không Giống Nhau..."
        ]);

        if (Hash::check($request->get("password_old"),$user->__get("password")))
        {
            $user->password = bcrypt($request->get("password"));
            $user->save();
            return redirect()->route("account")->with("thong_bao","Đổi Mật Khẩu Thành Công...");
        }

        return redirect()->back()->with("error","Đổi Mật Khẩu Không Thành Công...");
    }
    public function capQuyenAc($id)
    {
        $user = User::findOrFail($id);
//        dd($id);
        return view("backend.account.phan-quyen",compact("user"));
    }
    public function updateQuyenAc($id,Request $request)
    {
        $user = User::findOrFail($id);
        if ($user->__get("id")==1)
        {
            return redirect()->route("account")->with("thong_bao","Tài Khoản Này Không Được Cập Nhật Quyền");
        }
//        dd($request->__get("role"));
        try {
            $user->role = $request->__get("role");
            $user->save();
        }catch (\Exception $exception)
        {
            return redirect()->back();
        }
        return redirect()->route("account")->with("thong_bao","Cấp Quyền Thành Công.");
    }
}
