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
            $param  = $request->only(['username', 'password', 'password_confirm', 'captcha', 'clause', 'mobile', '__token__']);
            $verify = $this->validate($param, 'app\portal\validate\User');
            if (true !== $verify) {
                $msg = explode(',', $verify);
                return ['success' => false, 'msg' => isset($msg[1]) ?: '', 'field' => $msg[0], 'token' => $request->token()];
            } else {
                $sms = new Sms();
                $sms->sms($param['mobile']);
                if (session('?sms')) {
                    $data['username'] = $param['username'];
                    $data['password'] = $param['password'];
                    $data['mobile']   = $param['mobile'];
//                    $data['step']     = 2;
                    return ['success' => true, 'msg' => '', 'token' => '', 'data' => $data];
                }
            }
        }
        return false;
    }

    /*
     * 保存用户信息
     */
    public function save(Request $request, Users $user)
    {
        if (session('?sms')) {
            $data = $request->only(['smsCode', 'username', 'password', 'mobile']);
            if ($data['smsCode'] == session('sms.code')) {
                $result = $user::create([
                    'username' => trim($data['username']),
                    'password' => password_hash(trim($data['password']), PASSWORD_DEFAULT),
                    'mobile'   => $data['mobile']
                ]);
                session(null);
                return ['success' => true, 'username' => $result->username, 'userId' => $result->user_id];
            }
        }
        return null;
    }

    public function sendSmsAgain()
    {
        $sms = new Sms();
        $sms->sendSmsAgain();
    }
}