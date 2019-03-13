<?php

namespace app\http\middleware;


class Web
{
    public function handle($request, \Closure $next)
    {
        $auth    = new \app\portal\controller\Auth();
        $cookie  = $auth->getCookie();
        $session = $auth->getSession();
        if (!empty($cookie)) {

        }
        if (!empty($session)) {

        } else {
            return redirect('/login');
        };
        return $next($request);
    }
}
