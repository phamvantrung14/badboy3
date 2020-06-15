<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Mail;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function getFromRessetPas()
    {
        return view("backend.lay-lai-mk");
    }
    public function sendCodeRessetPass(Request $request)
    {
//        dd($request->all());
        $email = $request->email;
        $checkUser = User::where("email",$email)->first();
        if (!$checkUser)
        {
            return redirect()->back();
        }
        $remember_token = bcrypt(md5(time().$email));
        $checkUser->remember_token = $remember_token;
        $checkUser->save();
        $url = route('link-resetpas',["remember_token"=>$checkUser->remember_token,"email"=>$email]);
        $data = ["route" =>$url];

        \Mail::send('backend.email.reset-pas',$data,function($mess) use($checkUser) {
            $mess->from('trungpv398@gmail.com');
            $mess->to($checkUser->email, 'Visitor')->subject('Lấy lại mật khẩu');
        });
        return redirect()->back()->with("thong_bao","link lấy lại mật khẩu đã được gửi vào mail của bạn");
    }

    public function resetPassword(Request $request)
    {
        $remember_token = $request->remember_token;
        $email = $request->email;

//        dd($request->all());
        $checkUser = User::where([
            'remember_token'=>$remember_token,
            'email'=>$email
        ])->first();
        if (!$checkUser)
        {
            return redirect()->with("thong_bao","Xin lỗi đường dẫn không đúng vui lòng thử lại sau..");
        }
        return view("backend.email.ressetpas");
    }

    public function saveResetPassword(Request $request)
    {
//        dd($request->remember_token);
        $request->validate([
            "password"=>"required|min:6",
            "password_confirm"=>"required|same:password"
        ],
        [
            "password.required"=>"Mật khẩu không được để trống...",
            "password.min"=>"Mật khẩu phải tối thiểu 6 ký tự...",
            "password_confirm.same"=>"Mật khâu không giống nhau"
        ]);
        if ($request->password)
        {
            $remember_token = $request->remember_token;
            $email = $request->email;
            $checkUser = User::where([
                'remember_token'=>$remember_token,
                'email'=>$email
            ])->first();
            if (!$checkUser)
            {
                return redirect()->back()->with("thong_bao","Xin lỗi đường dẫn không đúng vui lòng thử lại sau..");
            }
            $checkUser->password = bcrypt($request->password);

//            dd($request->all());
            $checkUser->save();
            return redirect()->to(route("login-admin"))->with("thong_bao","Đổi mật khẩu thành công...");

        }

    }
}
