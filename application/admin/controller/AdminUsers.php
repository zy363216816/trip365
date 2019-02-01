<?php

namespace app\admin\controller;

use app\facade\Authenticated;
use think\Controller;
use app\admin\model\AdminUsers as Users;
use think\Request;

class AdminUsers extends Controller
{
    public function index()
    {
        return view('/admins');
    }

    public function getAdmin($username)
    {
        return Users::where('account', $username)->find();

    }

    public function getAdmins()
    {
        $res = Users::all();
        $row['page'] = 1;
        $row['records'] = 3;
        $row['total'] = 3;
        $row['rows'] = $res;
        return json($row);
    }

    public function form()
    {
        return view('/adminForm');
    }

    public function profile()
    {
        $admin = Authenticated::user();
        $this->assign('admin',$admin);
        return $this->fetch('/adminProfile');
    }
    public function add(Request $request)
    {
        if ($request->isAjax() && $request->isPost()){
            $data = $request->only(['account','password','password_confirm','name','mobile','__token__']);
            $valid = $this->validate($data,'app\admin\validate\Admin');
            $data['account'] = trim($request->post('account'));
            $data['password'] = trim($this->encrypt($request->post('password')));
            if (true !== $valid){
                return ['msg' => $valid, 'token' =>token() ];
            }else{
                $admin = Users::create($data);
                if ($admin){
                    return true;
                }
            }
        }
        return false;
    }

    public function del(Request $request)
    {
        $pk = $request->post('keyValues');
        if ($pk){
            $res = Users::destroy($pk);
            if ($res){
                return true;
            }
        }
        return false;
    }

    public function encrypt($password,$salt = 'sunny')
    {
        return crypt($password,md5($salt));
    }
}
