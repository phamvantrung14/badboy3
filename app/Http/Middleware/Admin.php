<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check())
            return redirect()->route("login-admin")->with("error","Bạn Cần Đăng Nhập ...");
        $currentUser = Auth::user();
        if ($currentUser->__get("role") != User::ADMIN_ROLE)
        {
            return abort(404);

        }

        return $next($request);
    }
}
