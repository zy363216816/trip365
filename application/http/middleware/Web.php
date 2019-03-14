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
        if (!empty($session) || $session != null) {

        } else {
            $url = $request->url();
            return redirect('/login')->with('URL', $url);
        };
        return $next($request);
    }
}
