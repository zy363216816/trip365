<?php

namespace app\admin\model;

use think\Model;

class Assets extends Model
{
    protected $auto = ['user_id'];

    public function setUserIdAttr()
    {
        return getAuthId();
    }
}
