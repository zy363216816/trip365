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
    /*
     * 保存通过认证用户信息到session
     */
    public function save($obj)
    {
        Session::set(self::$session_key,$obj);
    }

    /*
     * 获取认证用户信息
     */
    public function user()
    {
        return Session::get(self::$session_key);
    }

}