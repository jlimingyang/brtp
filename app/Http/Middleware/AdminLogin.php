<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
{
    public function handle($request, Closure $next)
    {
        if(session('userid' != 1)){
            return redirect('ssadmin');
        }
        return $next($request);
    }
}
