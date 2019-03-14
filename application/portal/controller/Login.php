<?php
/**
 * Created by PhpStorm.
 * User: Sunny
 * Date: 2019/3/10
 * Time: 15:06
 */

namespace app\portal\controller;


use app\portal\model\Users;
use think\Controller;
use think\facade\Session;
use think\Request;
use think\Validate;

class Login extends Controller
{
    protected $rule = [
        'username'    => 'require|max:25|token',
        'password'    => 'require',
        'captcha|验证码' => 'require|captcha',
    ];

    public function index()
    {
        $redirect = session('URL');
        $this->assign('redirect', $redirect);
        return view();
    }

    public function doLogin(Request $request, Users $user, Auth $auth)
    {
        $result   = ['success' => false, 'msg' => '登录失败密码或账号错误'];
        $validate = Validate::make($this->rule);
        if ($request->isAjax()) {
            $data = $request->only(['username', 'password', 'captcha', '__token__']);
            if ($validate->check($data)) {
                $res = $user->where('username', $data['username'])->find();
                if ($res !== null) {
                    $pwd    = $res->password;
                    $status = $res->getData('status'); //-1删除,账号状态,0-禁用,1-正常,2-待审核
                    if (password_verify(trim($data['password']), $pwd)) {
                        switch ($status) {
                            case 0:
                                $result['msg'] = lang('forbidden');
                                break;
                            case 2:
                                $result['msg'] = lang('authStr');
                                break;
                            default:
                                $auth->auth($res);
                                $this->authenticated();
                                $result['msg']     = lang('success');
                                $result['success'] = true;
                        }
                    }
                } else {
                    $result['msg'] = lang('fail');
                }
            } else {
                $result['msg'] = $validate->getError();
            }
        }
        $result['token'] = $request->token();
        return $result;
    }

    /*
     * 登录成功后的操作
     */
    public function authenticated()
    {
        $auth        = new Auth();
        $user        = $auth->getSession();
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