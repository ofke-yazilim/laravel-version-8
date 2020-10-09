<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //dd(\Auth::guard('admin')->check());
        if(\Auth::guard('web')->check()){
            return $next($request);
        } else {
            return redirect('login')->with("message","Sepete eklemek için üye girişi yapınız.");
        }
    }
}
