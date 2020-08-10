<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class User
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
        if(!Auth::check()){
            return redirect('login')->with('status', 'Please Login');
        }elseif(Auth::user()->role =="admin"){
             return redirect()->route('admin');
        }elseif(Auth::user()->role =="marketer"){
            return redirect()->route('marketer');

        }else{
            return $next($request);
        }
    }
}
