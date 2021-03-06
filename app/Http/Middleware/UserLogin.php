<?php

namespace App\Http\Middleware;

use Closure;

class UserLogin
{
    public function handle($request, Closure $next)
    {
        if(!session('userid')){
            return redirect('/');
        }

        return $next($request);
    }
}
