<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Article as Articles;

class Article extends Controller
{
    /**
     * 显示资源列表
     */
    public function index()
    {
        return view('list');
    }
    /**
     * 显示添加文章表格
     */
    public function form()
    {
        return view('form');
    }

    /**
     * 显示上传控件
     */
    public function assetUpload()
    {
        return view('upload');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $article = new Articles();
        if ($request->isPost()){
            $data = $request->post(false);
            $category =$data->category;
        }

        return false;
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
