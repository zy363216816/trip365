<?php
/**
 * User: User
 * Date: 2019-1-30
 * Time: 11:53
 */

namespace app\admin\validate;

use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'account'          => 'require|unique:admin_users|min:6|max:25|chsDash|token',
        'password'         => 'require|confirm|min:6|max:25',
        'password_confirm' => 'require',
        'name'             => 'chsAlpha',
        'mobile'           => 'mobile'
    ];

    protected $message  =   [
        'account.require'   => '账号不能为空',
        'account.min'       => '账号长度不能小于6位',
        'account.max'       => '账号长度不能超过25位',
        'account.unique'    => '账号已存在',
        'account.chsDash'   => '账号只能包含字母、数字、或_下划线',
        'password.min'      => '密码长度不能小于6位',
        'password.confirm'  => '密码输入不一致请重新输入',
        'name.chsAlpha'     => '姓名只能为字母',
        'mobile.mobile'     => '手机号码格式不正确',
    ];

}