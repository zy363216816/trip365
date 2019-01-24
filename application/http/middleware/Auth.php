<?php

namespace app\http\middleware;

use app\facade\Authenticated;

class Auth
{
    public function handle($request, \Closure $next)
    {
        if (Authenticated::user() !== null) {
            //do something
        } else {
          return redirect('/login');
        };
        return $next($request);
    }
}
