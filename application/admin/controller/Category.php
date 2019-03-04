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
    public function form($id = '')
    {
        if ($id != ''){
            $category = Categories::get($id);
            $this->assign('category', $category);
        }
        return view('form');
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
     */
    public function delete($id)
    {
        if (Categories::destroy($id)){
            return true;
        };
        return false;
    }

    public function getTree()
    {
        $category = Categories::All()->toArray();
        $tree     = toTree($category);
        $res      = $this->selectTree($tree);
        return json($res);
    }

    protected function selectTree($tree = [], $level = 0, &$arr = [])
    {
        $child = '_child';
        $icon  = ['├─', '└─'];
        $nbsp  = '&nbsp;&nbsp;';
        if (is_array($tree)) {
            foreach ($tree as $key => $value) {
                $refer   = [];
                $refer[] = $value['id'];
                if ($level > 0) {
                    if ($value !== end($tree)) {
                        $sign = $icon[0];
                    } else {
                        $sign = $icon[1];
                    }
                    $refer[] = str_repeat($nbsp, $level) . $sign . $value['name'];
                } else {
                    $refer[] = $value['name'];
                }
                array_push($arr, $refer);
                if (isset($value[$child])) {
                    $this->selectTree($value[$child], $level + 1, $arr);
                }
            }
            return $arr;
        }
        return null;
    }

    public function getGridTree()
    {
        $category = Categories::All()->toArray();
        $tree     = toTree($category);
        $res      = $this->gridTree($tree);
        return json($res);
    }

    protected function gridTree($tree = [], $level = 0, &$arr = [])
    {
        $child = '_child';
        foreach ($tree as $key => $value) {
            $refer                = [];
            $refer['id']          = $value['id'];
            $refer['name']        = $value['name'];
            $refer['description'] = $value['description'];
            $refer['status']      = $value['status'];
            $refer['sort']        = $value['sort'];
            $refer['level']       = $level;
            $refer['parent']      = $value['parent_id'];
            $refer['expanded']    = true;
            $refer['parent']      = $value['parent_id'];
            $refer['isLeaf']      = isset($value[$child]) ? false : true;
            array_push($arr, $refer);
            if (isset($value[$child])) {
                $this->gridTree($value[$child], $level + 1, $arr);
            }
        }
        return $arr;
    }
}
