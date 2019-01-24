<?php
/**
 * User: User
 * Date: 2019-1-24
 * Time: 10:45
 */

namespace app\facade;

use think\Facade;

class Authenticated extends Facade
{
    protected static function getFacadeClass()
    {
        return 'app\common\Authenticated';
    }
}