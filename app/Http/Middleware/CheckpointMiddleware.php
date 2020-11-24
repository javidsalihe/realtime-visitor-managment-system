<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckpointMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::getUser()->roles()->pluck('name')[0] == 'checkpoint') {
            return $next($request);
        }else{
            Auth::logout();
            return redirect('login');
        }
    }
}
