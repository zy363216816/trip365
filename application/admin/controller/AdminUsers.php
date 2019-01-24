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
        return json($res);
    }

    public function add()
    {
        Users::create([
            'admin_id' => guid(),
            'account' => 'admin',
            'password' => $this->encrypt('admin')
        ]);
    }

    public function encrypt($password,$salt = 'sunny')
    {
        return crypt($password,md5($salt));
    }
}
