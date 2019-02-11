<?php
use think\facade\Env;
//配置文件
return [
    'app_debug'              => true,
    // 应用Trace
    'app_trace'              => true,
    // 开启强制路由
    'url_route_must'		 => true,
    // 文件上传路径
    'upload'                 => Env::get('root_path').'public/upload/'
];