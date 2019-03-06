<?php

namespace app\admin\model;

use think\Model;

class Slides extends Model
{
    protected $autoWriteTimestamp = false;

    public function items()
    {
        return $this->hasMany('SlidesItem','slide_id');
    }
}
