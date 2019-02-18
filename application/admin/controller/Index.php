<?php

namespace app\admin\controller;

use app\facade\Authenticated;
use think\Controller;
use think\facade\Cache;

class Index extends Controller
{
    protected $middleware = ['Authenticated'];

    public function index()
    {
        $admin = Authenticated::user();
        $this->assign('admin',$admin);
        return view('/index');
    }

    public function clearCache()
    {
        Cache::clear();
        $this->success( '清除成功', '/admin/index' );
    }
}
