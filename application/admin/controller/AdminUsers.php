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
        $row ['total']= 1;
        $row ['page']= 1;
        $row ['records']= 1;
        $row['rows'] = $res;
        return json($row);
    }

    public function add()
    {
        Users::create([
            'account' => 'test',
            'password' => $this->encrypt('test')
        ]);
    }

    public function encrypt($password,$salt = 'sunny')
    {
        return crypt($password,md5($salt));
    }
}
