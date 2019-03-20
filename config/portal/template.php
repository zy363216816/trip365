<?php
//模板配置
return [
    'tpl_replace_string'  =>  [
        '__PORTAL__'=>'/public/static/portal',
        '__PLUGINS__' => '/public/static/plugins',
        '__BOOTSTRAP__' => '/public/static/admin/bootstrap',
    ],
    // 预先加载的标签库
    'taglib_pre_load'     =>    'app\common\taglib\Portal',
];
