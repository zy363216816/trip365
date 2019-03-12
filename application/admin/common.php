<?php

use app\facade\Authenticated;

function getUniName(){
    return md5(uniqid(microtime(true),true));
}

function getAuthId()
{
    $admin = Authenticated::user();
    return $admin['id'];
}

function toTree($arr, $pk='id', $pid = 'parent_id', $child = '_child', $root = 0)
{
    $tree = [];
    if(is_array($arr)) {
        $refer = [];
        foreach ($arr as $key => $val) {
            $refer[$val[$pk]] =& $arr[$key];
        }
        foreach ($arr as $key => $val) {
            $parentId =  $val[$pid];
            if ($root == $parentId) {
                $tree[] =& $arr[$key];
            }else{
                if (isset($refer[$parentId])) {
                    $parent =& $refer[$parentId];
                    $parent[$child][] =& $arr[$key];
                }
            }
        }
    }
    return $tree;
}