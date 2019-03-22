<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/22
 * Time: 10:21
 */

namespace app\portal\controller;


use app\portal\model\Articles;
use think\Controller;

class Article extends Controller
{
    public function index()
    {

    }

    public function read(Articles $article, $id)
    {
        $art = $article::get($id);
        $this->assign('article', $art);
        return view('detail');
    }
}