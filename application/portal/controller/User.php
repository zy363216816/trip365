<?php
/**
 * Created by PhpStorm.
 * User: Sunny
 * Date: 2019/3/10
 * Time: 18:40
 */

namespace app\portal\controller;


use think\Controller;

class User extends Controller
{
    protected $middleware = ['Web'];

    public function index()
    {
        return view();
    }


    public function home()
    {

    }

    public function profile()
    {
        return view();
    }

}