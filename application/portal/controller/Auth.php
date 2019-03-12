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
    private static $session_key = '_WEB_USER_SESSION_INFO_';
    private static $cookie_key = '_WEB_USER_COOKIE_INFO_';

    public function auth($value)
    {
        $this->setSession($value);
        $this->setCookie($value);
    }

    protected function setSession($value)
    {
        Session::set(self::$session_key, $value);
    }

    protected function setCookie($value)
    {
        Cookie::set(self::$cookie_key, $value);
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