<?php

namespace app\http\middleware;

use app\facade\Authenticated;

class Auth
{
    public function handle($request, \Closure $next)
    {
        if (Authenticated::user() !== null) {
            $time = time();
            $name = Authenticated::sessionTimeName();
            $session_time = session($name);
            if ($time - $session_time >= 3600){
                session(null);
                return redirect('/login');
            }else{
                session($name,$time);
            }
        } else {
          return redirect('/login');
        };
        return $next($request);
    }
}
