<?php

namespace app\admin\controller;

use app\admin\model\Categories;
use think\Controller;
use think\Request;

class Category extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function form()
    {
        return view('form');
    }

    /**
     * 获取全部资源.
     *
     * @return \think\Response
     */
    public function getAll()
    {
        $category = Categories::All();
        return $category;
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data     = $request->param();
        $category = new Categories;
        $category::create([
            'parent_id'       => $data['parent_id'],
            'name'            => $data['name'],
            'description'     => $data['description'],
            'seo_title'       => $data['seo_title'],
            'seo_keywords'    => $data['seo_keywords'],
            'seo_description' => $data['seo_description'],
            'index_tpl'       => $data['index_tpl'],
            'list_tpl'        => $data['list_tpl'],
            'one_tpl'         => $data['one_tpl'],
            'more'            => json_encode($data['more']),
        ]);
    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }

    public function getTree()
    {
        $category = Categories::All()->toArray();
        $tree = toTree($category);
        $res = $this->selectTree($tree);
        return json($res);
    }

    public function selectTree($tree = [],$level = 1)
    {
        $icon = ['├─', '└─'];
        $nbsp = '&nbsp;&nbsp;';
        $child = '_child';
        $data = [];
        if (is_array($tree)){
            foreach ($tree as $value){
                array_push($data,$value);
                if (isset($value[$child])){
                    $this->selectTree($value[$child],$level ++);
                }
                if ($level != 1 && current($tree) == end($tree)){
                    $value['name'] = $nbsp * $level . $icon[1].$value['name'];
                }else{
                    $value['name'] = $nbsp * $level . $icon[2].$value['name'];
                }
            }
            return $data;
        }
        return null;
    }
}
