<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/6
 * Time: 10:43
 */

namespace app\admin\controller;


use app\admin\model\Slides;
use app\admin\model\SlidesItem;
use think\Controller;
use think\Request;
use think\Validate;

class Slide extends Controller
{
    public function index()
    {
        $slides = Slides::all();
        $this->assign('slides', $slides);
        return view();
    }

    public function form($id = '')
    {
        if ($id != '') {
            $slide = Slides::get($id);
            $this->assign('slide', $slide);
        }
        return view();
    }

    public function item($id = '')
    {
        if ($id != '') {
            $slide  = Slides::get($id);
            $this->assign('slide_id', $id);
            $this->assign('result', $slide->items);
        }
        return view();
    }

    public function itemForm($id)
    {
        if ($id != '') {
            $this->assign('slide_id', $id);
            $this->assign('result', '');
        }
        return view('itemForm');
    }

    public function itemImage($id)
    {
        $asset = new Asset();
        $res = $asset->read($id);
        return $res;
    }

    public function assets()
    {
        return view('assets/upload');
    }

    public function saveItem(Request $request)
    {
        $data = $request->param();
        SlidesItem::create([
            'slide_id'    => $data['slide_id'],
            'title'       => $data['title'],
            'image'       => $data['image'],
            'url'         => $data['url'],
            'target'      => $data['target'],
            'description' => $data['description'],
            'content'     => $data['content']
        ]);
        return redirect('/slide/item',['id' => $data['slide_id']?:'']);
    }

    public function save(Request $request)
    {
        $validate = Validate::make([
            'name' => 'require|unique:Slides|max:25',
        ]);
        $res      = $validate->check(['name' => $request->post('name')]);
        if ($res) {
            Slides::create([
                'name'   => $request->post('name'),
                'remark' => $request->post('remark')
            ], ['name', 'remark'], true);
            return redirect('/slide/index');
        } else {
            return $validate->getError();
        }
    }

    public function delete(Request $request, $id)
    {
        Slides::destroy($id);
        return redirect('/slide/index');
    }

    public function deleteItem(Request $request, $id)
    {
        SlidesItem::destroy($id);
        return redirect('/slide/item');
    }


}