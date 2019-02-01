<?php
/**
 * User: User
 * Date: 2019-1-30
 * Time: 11:53
 */

namespace app\admin\validate;

use app\admin\model\AdminUsers;
use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'account'          => 'require|checkUnique|min:5|max:25|chsDash|token',
        'password'         => 'require|confirm|min:5|max:25',
        'password_confirm' => 'require',
        'name'             => 'chsAlpha',
        'mobile'           => 'mobile'
    ];

    protected $message  =   [
        'account.require'   => '账号不能为空',
        'account.min'       => '账号长度不能小于5位',
        'account.max'       => '账号长度不能超过25位',
        'account.chsDash'   => '账号只能包含字母、数字、或_下划线',
        'password.min'      => '密码长度不能小于5位',
        'password.confirm'  => '密码输入不一致请重新输入',
        'name.chsAlpha'     => '姓名只能为字母',
        'mobile.mobile'     => '手机号码格式不正确',
    ];

    protected function checkUnique($value, $rule, $data = [])
    {
        $db = new AdminUsers();
        $row = $db::withTrashed()->where('account',$value)->find();
        if ($row !== null){
            return '账号已存在';
        }
        return true;
    }

}