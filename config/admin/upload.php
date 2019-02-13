<?php
/**
 * User: User
 * Date: 2019-2-12
 * Time: 15:09
 */
return[
    'upload_path' => \think\facade\Env::get('root_path').'upload/ueditor/',
    'types' => [
        'image' => [
            'max_size' => '10240',//单位KB
            'extensions'          => 'jpg,jpeg,png,gif,bmp4'
        ],
        'video' => [
            'max_size' => '10240',
            'extensions'          => 'mp4,avi,wmv,rm,rmvb,mkv'
        ],
        'audio' => [
            'max_size' => '10240',
            'extensions'          => 'mp3,wma,wav'
        ],
        'file'  => [
            'max_size' => '10240',
            'extensions'          => 'txt,pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar'
        ]
    ],
    'chunk_size' => 512,//单位KB
    'max_files'  => 20 //最大同时上传文件数
];