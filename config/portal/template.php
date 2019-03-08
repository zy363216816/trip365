<?php
//模板配置
return [
    'tpl_replace_string'  =>  [
        '__PORTAL__'=>'/static/portal',
        '__PLUGINS__' => '/static/plugins',
        '__BOOTSTRAP__' => '/static/admin/bootstrap',
    ],
    // 预先加载的标签库
    'taglib_pre_load'     =>    'app\common\taglib\Portal',
];
