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

//后台路由地址
Route::get('admin/login', 'admin/Login/index');
Route::post('admin/login', 'admin/Login/login');
Route::group('admin', function () {
    Route::get('index', 'index/index');
    Route::get('dashboard', 'index/dashboard');
    //管理员相关
    Route::get('admins', 'AdminUsers/index');
    Route::get('form', 'AdminUsers/form');
    Route::post('add', 'AdminUsers/add');
    Route::post('delete', 'AdminUsers/del');
    Route::get('profile', 'aAdminUsers/profile');
    Route::get('avatar', 'AdminUsers/avatar');
    Route::post('uploadAvatar', 'AdminUsers/uploadFile');
    Route::post('changePwd', 'AdminUsers/changePassword');
    Route::get('getAdmins', 'AdminUsers/getAdmins');
    Route::get('Article', 'Article/index');
})->prefix('admin/')->middleware('Auth');

//内容管理相关
Route::group('article', function () {
    Route::get('ArticleList', 'Article/index');
    Route::get('getArticles', 'Article/getAll');
    Route::get('form', 'Article/form');
    Route::post('add', 'Article/save');
    Route::post('del', 'Article/delete');
    Route::get('asset', 'Article/assetUpload');
})->prefix('admin/')->middleware('Auth');

Route::group('asset', function () {
    Route::post('webUpload.php', 'webUpload/index');
    Route::rule('upload', 'Ueditor/index', 'GET|POST');
})->prefix('admin/')->middleware('Auth');

//分类设置
Route::group('category', function () {
    Route::get('index', 'Category/index');
    Route::get('form', 'Category/form');
    Route::get('showAll', 'Category/getGridTree');
    Route::post('add', 'Category/save');
    Route::post('del', 'Category/delete');
    Route::get('getTree', 'Category/getTree');
    Route::get('getAll', 'Category/getAll');
})->prefix('admin/')->middleware('Auth');

//幻灯片
Route::group('slide', function () {
    Route::get('index', 'index');
    Route::get('form', 'form');
    Route::post('save', 'save');
    Route::post('delete', 'delete');
    Route::get('item', 'item');
    Route::get('addItem', 'itemForm');
    Route::get('assets', 'assets');
    Route::post('saveItem', 'saveItem');
    Route::get('itemImage', 'itemImage');
    Route::post('deleteItem', 'deleteItem');
})->prefix('admin/Slide/')->middleware('Auth');

// 前端路由
Route::get('index', 'portal/index/index');
Route::get('login', 'portal/login/index');
Route::post('login', 'portal/login/doLogin');
Route::get('register', 'portal/register/index');

//登录注册
Route::post('user/register', 'portal/register/register');
Route::post('user/add', 'portal/register/save');
Route::get('register/sms', 'portal/register/sendSmsAgain');


//个人主页
Route::get('user/center', 'portal/user/index')->middleware('Web');
Route::get('user/profile', 'portal/user/profile')->middleware('Web');



