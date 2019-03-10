<?php
/**
 * Created by PhpStorm.
 * User: Sunny
 * Date: 2019/3/10
 * Time: 15:06
 */

namespace app\portal\controller;


use think\Controller;
use think\facade\Session;
use think\Request;

class Login extends Controller
{
    protected $rule = [
        'username'    => 'require|max:25',
        'password'    => 'require',
        'captcha|验证码' => 'require|captcha',
        '__token__'   => 'token',
    ];

    public function index()
    {
        return view();
    }

    public function login(Request $request)
    {
        $data = $request->param();
        return $data;
    }

    /*
     * 登录成功后的操作
     */
    public function authenticated()
    {
        $user        = Authenticated::user();
        $key         = $user['id'];
        $login_times = $user['login_times'];
        $admin       = new \app\admin\model\AdminUsers();
        $admin->save([
            'login_time' => date('Y-m-d H:i:s', time()),
            'ip'         => $this->request->ip(),
            'login_num'  => $login_times + 1], ['id' => $key]);
    }

    /*
     * 注销登录
     */
    public function logout()
    {
        Session::clear();
        $this->success('注销登录成功');
    }
}