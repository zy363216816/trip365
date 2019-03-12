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
        'username'    => 'require|max:25',
        'password'    => 'require',
        'captcha|验证码' => 'require|captcha',
        '__token__'   => 'token',
    ];

    public function index()
    {
        return view();
    }

    public function doLogin(Request $request, Users $user)
    {
        $result   = ['success' => false, 'msg' => ''];
        $validate = Validate::make($this->rule);
        $res      = null;
        if ($request->isAjax()) {
            $data = [
                'username' => $request->post("username"),
                'password' => $request->post("password"),
                'captcha'  => $request->post("captcha")
            ];
            if ($validate->check($data)) {
                $res = $user->where('username', $data['username'])->find();
                if ($res !== null) {
                    $pwd    = $res->password;
                    $status = $res->getData('status'); //-1删除,账号状态,0-禁用,1-正常,2-待审核
                    if ($pwd === password_hash($data['password'], PASSWORD_DEFAULT)) {
                        switch ($status) {
                            case 0:
                                return lang('forbidden');
                                break;
                            case 2:
                                return lang('authStr');
                                break;
                            default:
                                Authenticated::save($res);
                                $this->authenticated();
                                return lang('success');
                        }
                    }
                }
                return lang('fail');
            } else {
                $res['msg']  = $validate->getError();
                $res['code'] = -1;
            }
        }
        return $result;
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