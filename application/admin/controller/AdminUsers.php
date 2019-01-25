<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\AdminUsers as Users;

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
        $row['code'] = 0;
        $row['msg'] = '';
        $row['count'] = 3;
        $row['data'] = $res;
        return json($row);
    }

    public function form()
    {
        return view('/adminForm');
    }

    public function add()
    {
        Users::create([
            'account' => 'demo',
            'password' => $this->encrypt('demo')
        ]);
    }

    public function encrypt($password,$salt = 'sunny')
    {
        return crypt($password,md5($salt));
    }
}
