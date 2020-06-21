<?php

namespace App\Http\Middleware;
//use Auth;
use Closure;
use Illuminate\Support\Facades\Auth;

class CustomerMiddleWare
{
    private $cus;
    public function __construct()
    {
    }
    public function getImage()
    {
        if (is_null($this->get("image")))
        {

            return asset("https://cf.shopee.vn/file/e5c67a99dc9a993d26a88bfd104323d5_tn");
        }else{
            return asset($this->__get("image"));
        }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = "cus")
    {
        if (!Auth::guard($guard)->check()){
            return redirect()->route("customer.login");

        }
        return $next($request);
    }
}
