<?php

namespace app\admin\model;

use think\Model;

class Assets extends Model
{
    public function setUserIdAttr()
    {
        return getAuthId();
    }
}
