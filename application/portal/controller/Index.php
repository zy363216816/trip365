<?php
namespace app\portal\controller;

use think\Controller;

class Index extends Controller
{
    protected $middleware = ['Web'];
    public function index()
    {
        return view('index');
    }
}
