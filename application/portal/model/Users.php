<?php

namespace app\portal\model;

use think\Model;
use think\model\concern\SoftDelete;

class Users extends Model
{
    use SoftDelete;
    protected $pk = 'id';//设置主键
    protected $hidden = ['password'];//隐藏字段
    protected $auto = ['ip'];//新增更新自动完成字段
    protected $insert = ['user_id', 'status' => 1];//新增自动完成字段
    protected $update = [];//更新自动完成字段
    // 定义时间戳字段名
    protected $deleteTime = 'delete_time';//软删除字段

    public function getStatusAttr($val)
    {
        $status = [-1 => '删除', 0 => '禁用', 1 => '正常', 2 => '待审核'];
        return $status[$val];
    }

    public function getGenderAttr($val)
    {
        $gender = [null => '待定', 0 => '女', 1 => '男'];
        return $gender[$val];
    }

    public function setUserIdAttr()
    {
        return guid();
    }

    public function setIpAttr()
    {
        return request()->ip();
    }

    public function setStatusAttr()
    {
        return 1;
    }
}
