<?php
/**
 * Created by PhpStorm.
 * User: Sunny
 * Date: 2019/3/10
 * Time: 15:34
 */

namespace app\portal\controller;


use app\common\sms\Sms;
use app\portal\model\Users;
use think\Controller;
use think\Request;

class Register extends Controller
{
    public function index()
    {
        return view();
    }

    public function register(Request $request)
    {
        if ($request->isAjax() && $request->isPost()) {
            $param  = $request->only(['username', 'password', 'confirm_password', 'captcha', 'clause', 'mobile', '__token__']);
            $verify = $this->validate($param, 'app\portal\validate\User');
            if (true !== $verify) {
                return ['error' => $verify];
            } else {
                $this->sms($param['mobile']);
                if (session('?sms')) {
                    $user['username'] = $param['username'];
                    $user['password'] = $param['password'];
                    return ['code' => 'OK', 'data' => $user];
                }
            }
        }
        return false;

    }

    /*
     * 保存用户信息
     */
    protected function save(Request $request, Users $user)
    {
        if (session('?sms')) {
            $data = $request->param();
            if ($data['code'] === session('sms.code')) {
                session(null);
                $user::create([
                    'username' => trim($data->username),
                    'password' => password_hash(trim($data->password), PASSWORD_DEFAULT),
                ]);
            }
        }
    }

    protected function sms($mobile)
    {
        $code   = mt_rand(10000, 99999);
        $result = Sms::sendSms($mobile, $code);//发送短信验证码
        if ($result['code'] == 'OK' && $result['Message'] == 'OK') {
            //发送成功
            session('sms.mobile', $mobile);
            session('sms.code', $code);
        }
    }
}