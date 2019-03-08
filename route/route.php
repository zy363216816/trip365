<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('login', 'admin/Login/index');
Route::post('login', 'admin/Login/login');
Route::get('admin/index','admin/index/index');

Route::get('admin/dashboard','admin/index/dashboard');

//管理员相关
Route::get('admin/admins','admin/AdminUsers/index');
Route::get('admin/form','admin/AdminUsers/form');
Route::post('admin/add','admin/AdminUsers/add');
Route::post('admin/delete','admin/AdminUsers/del');
Route::get('admin/profile','admin/AdminUsers/profile');
Route::get('admin/avatar','admin/AdminUsers/avatar');
Route::post('admin/uploadAvatar','admin/AdminUsers/uploadFile');
Route::post('admin/changePwd','admin/AdminUsers/changePassword');
Route::get('admin/getAdmins','admin/AdminUsers/getAdmins');

//内容管理相关
Route::get('admin/Article','admin/Article/index');
Route::get('article/ArticleList','admin/Article/index');
Route::get('article/getArticles','admin/Article/getAll');
Route::get('article/form','admin/Article/form');
Route::post('article/add','admin/Article/save');
Route::post('article/del','admin/Article/delete');
Route::get('article/asset','admin/Article/assetUpload');
Route::post('asset/webUpload.php','admin/webUpload/index');
Route::rule('asset/upload','admin/Ueditor/index','GET|POST');

//分类设置
Route::get('category/index','admin/Category/index');
Route::get('category/form','admin/Category/form');
Route::get('category/showAll','admin/Category/getGridTree');
Route::post('category/add','admin/Category/save');
Route::post('category/del','admin/Category/delete');
Route::get('category/getTree','admin/Category/getTree');
Route::get('category/getAll','admin/Category/getAll');

//幻灯片
Route::get('slide/index','admin/Slide/index');
Route::get('slide/form','admin/Slide/form');
Route::post('slide/save','admin/Slide/save');
Route::post('slide/delete','admin/Slide/delete');
Route::get('slide/item','admin/Slide/item');
Route::get('slide/addItem','admin/Slide/itemForm');
Route::get('slide/assets','admin/Slide/assets');
Route::post('slide/saveItem','admin/Slide/saveItem');
Route::get('slide/itemImage','admin/Slide/itemImage');
Route::post('slide/deleteItem','admin/Slide/deleteItem');


