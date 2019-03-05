<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAdmin
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
        if(session('adminlogin')){
            if (Hash::check($data['upwd'], session(['admin.upwd'])) {
                return $next($request);
            }
            session(['adminlogin'=>false]);
            session(['admin'=>null]);
            return redirect('/admin/login')->with('error','您的密码已被修改，请重新登录');
        }
        return redirect('/admin/login');
    }
}
