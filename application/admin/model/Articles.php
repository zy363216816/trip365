<?php

namespace app\admin\model;

use think\Model;

class Articles extends Model
{
    protected $pk = 'id';
    protected $auto = ['user_id'];

    public function getArticleStatusAttr($val)
    {
        return $val == 1 ? '已发布' : '为发布';
    }

    public function setUserIdAttr()
    {
        return getAuthId();
    }

    public function user()
    {
        return $this->belongsTo('AdminUsers', 'user_id');
    }
}
