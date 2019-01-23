<?php

namespace app\http\middleware;

use think\facade\Session;

class Auth
{
    public function handle($request, \Closure $next)
    {
        if (Session::has('AdminId') && Session::get('AdminId') !== null) {
            //do something
        } else {
          return redirect('/login');
        };
        return $next($request);
    }
}
