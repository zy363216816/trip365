<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/12
 * Time: 16:55
 */

namespace app\portal\controller;

use think\facade\Cookie;
use think\facade\Session;


class Auth
{
    private static $session_key = 'WEB_USER_SESSION_INFO';
    private static $cookie_key = 'WEB_USER_COOKIE_INFO';

    public function auth($value)
    {
        $this->setCookie($value);
        $this->setSession($value);
    }

    protected function setSession($value)
    {
        Session::set(self::$session_key, $value->toArray());
    }

    protected function setCookie($value)
    {
        Cookie::set(self::$cookie_key, base64_encode(json_encode($value->toArray())));
    }

    public function getSession()
    {
        return Session::get(self::$session_key);
    }

    public function getCookie()
    {
        return Cookie::get(self::$cookie_key);
    }
}