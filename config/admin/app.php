<?php
use think\facade\Env;
//配置文件
return [
    'app_debug'              => true,
    // 应用Trace
    'app_trace'              => true,
    // 开启强制路由
    'url_route_must'		 => true,
    // 默认输出类型
    'default_return_type'    => 'json',
    // 文件上传路径
    'uploads'                 => Env::get('root_path').'public/uploads/'
];