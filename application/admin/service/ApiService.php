<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/7
 * Time: 10:43
 */

namespace app\admin\service;

use think\Db;

class ApiService
{
    /**
     * 获取所有友情链接
     */
    public static function links()
    {
        return Db::name('link')->where('status', 1)->order('sort ASC')->select();
    }

    /**
     * 获取所有幻灯片
     * @param $slideId
     * @return false|\PDOStatement|string|\think\Collection
     */
    public static function slides($slideId)
    {
        $slideCount = Db::name('slides')->where('id', $slideId)->where(['status' => 1, 'delete_time' => null])->count();
        if ($slideCount == 0) {
            return false;
        }
        $slides = Db::name('slide_items')->where('status', 1)->where('slide_id', $slideId)->order('sort ASC')->select();

        return $slides;
    }
}