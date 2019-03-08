<?php

namespace app\admin\model;

use think\Model;

class SlideItems extends Model
{
    public function image()
    {
        $this->hasOne('assets','image');
    }
}
