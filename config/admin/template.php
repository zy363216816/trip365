<?php
use think\facade\Env;
//模板配置
return [
    // 模板路径
    'view_path'    => Env::get('app_path').'template/admin/',
    'tpl_replace_string'  =>  [
        '__ADMIN__'=>'/static/admin',
        '__PLUGINS__' => '/static/plugins',
    ]
];
