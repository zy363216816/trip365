<?php

namespace app\admin\controller;

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

    public function add(Request $request)
    {
        if ($request->isAjax() && $request->isPost()){
            $data = $request->only(['account','password','password_confirm','name','mobile','__token__']);
            $valid = $this->validate($data,'app\admin\validate\Admin');
            if (true !== $valid){
                return ['msg' => $valid, 'token' =>token() ];
            }else{
                return true;
//                $admin = Users::create($_POST);
//                if ($admin){
//                    return true;
//                }
            }
        }
        return false;
    }

    public function encrypt($password,$salt = 'sunny')
    {
        return crypt($password,md5($salt));
    }
}
