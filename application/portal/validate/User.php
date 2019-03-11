<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/11
 * Time: 16:26
 */

namespace app\portal\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'captcha|验证码'   => 'require|captcha',
        'username'         => 'require|checkUnique|min:5|max:25|chsDash|token',
        'password'         => 'require|confirm|min:5|max:25',
        'password_confirm' => 'require',
        'mobile'           => 'mobile'
    ];

    protected $message = [
        'username.require' => '账号不能为空',
        'username.min'     => '账号长度不能小于5位',
        'username.max'     => '账号长度不能超过25位',
        'username.chsDash' => '账号只能包含字母、数字、或_下划线',
        'password.min'     => '密码长度不能小于5位',
        'password.confirm' => '密码输入不一致请重新输入',
        'mobile.mobile'    => '手机号码格式不正确',
    ];

}