<?php

namespace app\http\middleware;


class Web
{
    public function handle($request, \Closure $next)
    {
        $auth = new \app\portal\controller\Auth();
        if ($auth->getSession() != null) {

        } else {
            return redirect('/login');
        };
        return $next($request);
    }
}
