<?php

use app\facade\Authenticated;

function guid()
{
    if (function_exists('com_create_guid')) {
        return com_create_guid();
    } else {
        mt_srand((double)microtime() * 10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = substr($charid, 0, 8) . $hyphen
            . substr($charid, 8, 4) . $hyphen
            . substr($charid, 12, 4) . $hyphen
            . substr($charid, 16, 4) . $hyphen
            . substr($charid, 20, 12);
        return $uuid;
    }
}

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