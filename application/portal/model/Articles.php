<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/22
 * Time: 10:31
 */

namespace app\portal\model;


use think\Model;

class Articles extends Model
{

    public function getUserIdAttr($val)
    {
        return '途迹网';
    }
}