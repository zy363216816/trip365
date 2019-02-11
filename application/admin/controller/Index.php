<?php

namespace app\admin\controller;

use app\facade\Authenticated;
use think\App;
use think\Controller;
use think\facade\Cache;
use think\Request;

class Index extends Controller
{
    protected $middleware = ['Authenticated'];

    public function index()
    {
        $admin = Authenticated::user();
        $this->assign('admin',$admin);
        return view('/index');
    }

    function clearCache()
    {
        Cache::clear();
        $this->success( '清除成功', '/admin/index' );
    }
}
