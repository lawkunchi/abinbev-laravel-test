<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CheckUserSession
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
        if (Auth::User()->session !== Session::getId()) {

            Session::getHandler()->destroy(Auth::User()->session);

            $request->session()->regenerate();
            Auth::user()->session = Session::getId();

            Auth::user()->save();
        }
        return $next($request);
    }
}
