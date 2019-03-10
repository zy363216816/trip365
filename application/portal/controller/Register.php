<?php
/**
 * Created by PhpStorm.
 * User: Sunny
 * Date: 2019/3/10
 * Time: 15:34
 */

namespace app\portal\controller;


use think\Controller;
use think\Request;

class Register extends Controller
{
    protected $rule = [
        'username'    => 'require|unique:users|max:25',
        'password'    => 'require|confirm',
        'mobile'      => 'mobile',
        'captcha|验证码' => 'require|captcha',
        '__token__'   => 'token',
    ];

    public function index()
    {
        return view();
    }

    public function register(Request $request)
    {
        if ($request->isAjax() && $request->isPost()){

        }

    }
}