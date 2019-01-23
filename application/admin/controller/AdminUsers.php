<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\AdminUsers as Users;

class AdminUsers extends Controller
{
    public function getAdmin($username)
    {
        return Users::where('account', $username)->find();

    }

    public function saveSession()
    {

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
