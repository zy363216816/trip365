<?php

namespace app\admin\controller;

use think\App;
use think\Controller;
use app\admin\model\AdminUsers as Users;

class AdminUsers extends Controller
{
    public function getUser($username,$password)
    {
        $user = Users::where('status',0)
            ->where(['account' => $username, 'password' => $password])
            ->find();
        return $user;
    }

    public function saveSession()
    {

    }

    public function add()
    {
        $users = new Users();

    }
}
