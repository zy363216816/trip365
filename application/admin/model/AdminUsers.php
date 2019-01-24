<?php

namespace app\admin\model;

use think\Model;

class AdminUsers extends Model
{
    protected $pk = 'id';//设置主键
    protected $hidden = ['password'];//隐藏字段
    protected $auto = ['ip'];//新增更新自动完成字段
    protected $insert = ['admin_id','status' => 1];//新增自动完成字段
    protected $update = [];//更新自动完成字段
    // 定义时间戳字段名
    protected $createTime = 'create_at';
    protected $updateTime = 'update_at';

    public function getStatusAttr($val)
    {
        $status = [-1=>'删除',0=>'禁用',1=>'正常',2=>'待审核'];
        return $status[$val];
    }

    public function setAdminIdAttr()
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
