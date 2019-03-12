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
        'username'    => 'require|unique:users|min:5|max:25|chsDash|token',
        'mobile'      => 'mobile',
        'password'    => 'require|confirm|min:5|max:25|chsDash',
        'captcha|验证码' => 'require|captcha',
        'clause'      => 'require',
    ];

    protected $message = [
        'username.require' => 'username,账号不能为空',
        'username.min'     => 'username,账号长度不能小于5位',
        'username.max'     => 'username,账号长度不能超过25位',
        'username.chsDash' => 'username,账号只能包含字母、数字、或_下划线',
        'password.min'     => 'password,密码长度不能小于5位',
        'password.chsDash' => 'password,密码过于简单',
        'password.confirm' => 'password_confirm,密码输入不一致请重新输入',
        'mobile.mobile'    => 'mobile,手机号码格式不正确',
        'captcha.captcha'  => 'captcha,验证码输入不正确',
        'clause'           => 'clause,请同意并勾选服务条款',
    ];

}