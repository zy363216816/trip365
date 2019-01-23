<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Validate;

class Login extends Controller
{
    protected $rule = [
        'username' => 'require|max:25',
        'password' => 'require',
        'captcha|验证码'=>'require|captcha',
        '__token__' => 'token',
    ];

    public function index()
    {
        return view('/login');
    }
    /*
     * 执行登录操作
     */
    public function login(Request $request)
    {
        $validate   = Validate::make($this->rule);
        $res = null;
        if ($request->isAjax()){
            $data = [
                'username' => $request->post("username"),
                'password' => $request->post("password"),
                'captcha'  => $request->post("captcha")
            ];
            if ($validate->check($data)){
                $admin = new AdminUsers();
                $user= $admin->getAdmin($data['username']);
                if ($user !== null){
                    $pwd = $user->password;
                    $status = $user->status; //账号状态,0-正常,1-禁用
                    $deleted = $user->deleted; //账号删除标志,0-正常,1-删除
                    if ($pwd === $admin->encrypt($data['password'])){
                        if ($status === 1){//账户被禁用
                            return lang('forbidden');
                        }elseif ($deleted === 1){//账户被注销
                            return lang('delete');
                        }else{//登录成功
                            session('AdminId',$user->admin_id);
                            return lang('success');
                        }
                    }
                }
                return lang('fail');
            }else{
                $res['msg'] = $validate->getError();
                $res['code'] = -1;
            }
        }
        return json($res);
    }
    /*
     * 注销登录
     */
    public function logout()
    {

    }
}
