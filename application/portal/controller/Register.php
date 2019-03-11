<?php
/**
 * Created by PhpStorm.
 * User: Sunny
 * Date: 2019/3/10
 * Time: 15:34
 */

namespace app\portal\controller;


use app\portal\model\Users;
use think\Controller;
use think\Request;

class Register extends Controller
{
    public function index()
    {
        return view();
    }

    public function register(Request $request, Users $user)
    {
        if ($request->isAjax() && $request->isPost()) {
            $param  = $request->only(['username', 'password', 'confirm_password', 'captcha', 'clause', 'mobile','__token__']);
            $verify = $this->validate($param, 'app\portal\validate\User');
            if (true !== $verify) {
                return ['error' => $verify];
            }else{

            }

        }

    }
}