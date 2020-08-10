<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        if(!Auth::check()){
            return redirect('login')->with('status', 'Please Login');
        }
        if(Auth::user()->role =="admin"){
            return $next($request);
        }else{
            return redirect()->route('dashboard');
        }
        if(Auth::user()->role =="marketer"){
            return redirect()->route('marketer');
        }
        if(Auth::user()->role == "user"){
            return redirect()->route('dashboard');
        }
    }
}
