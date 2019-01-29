<?php
/**
 * User: User
 * Date: 2019-1-24
 * Time: 10:24
 */

namespace app\common;

use think\facade\Session;

class Authenticated
{
    private static $session_key = 'USER_INFO_SESSION';

    private static $session_time = 'SESSION_TIME';
    /*
     * 保存通过认证用户信息到session
     */
    public function save($obj)
    {
        Session::set(self::$session_key,$obj);
        $this->expire();
    }

    public function sessionTimeName()
    {
        return self::$session_time;
    }

    /*
     * 保存session设置时间
     */
    public function expire()
    {
        Session::set(self::$session_time,time());
    }
    /*
     * 获取认证用户信息
     */
    public function user()
    {
        return Session::get(self::$session_key);
    }

}