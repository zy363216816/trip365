<?php

namespace app\admin\controller;

use think\App;
use think\Controller;
use think\facade\Cache;
use think\Request;

class Index extends Controller
{
    protected $middleware = ['Auth'];

    public function index()
    {
        return view('/index');
    }

    function clearCache()
    {
        Cache::clear();
        $this->success( '清除成功', 'index/index' );
    }
}
