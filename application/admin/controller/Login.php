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
        $result = [
            'code'    => '0', //0 - 登录失败，1 - 登录成功，2 - 账户禁用
            'success' => false,
            'msg'     => '登录失败'
        ];
        if ($request->isAjax()){
            $data = [
                'username' => $request->post("username"),
                'password' => $request->post("password"),
                'captcha'  => $request->post("captcha")
            ];
            if ($validate->check($data)){
                $result['code']    = '1';
                $result['success'] = true;
                $result['msg']     = '登录成功';
            }else{
                $result['msg']     = $validate->getError();
            }
        }
        return json($result);
    }
    /*
     * 注销登录
     */
    public function logout()
    {

    }
}
