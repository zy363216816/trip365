<?php

namespace app\admin\model;

use think\Model;

class SlidesItem extends Model
{
    public function image()
    {
        $this->hasOne('assets','image');
    }
}
