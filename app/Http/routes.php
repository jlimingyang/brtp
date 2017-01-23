<?php
/**
 * by wdful
 */

/**
 * 前端
 */
Route::group(['middleware' => ['web'],'namespace'=>'Index'],function () {
    Route::get('regist', function () { return view('front.regist');}); //注册页面
    Route::post('registe', 'IndexController@registe');   //注册
    Route::get('/', 'IndexController@index');   //登录首页
    Route::post('login', 'IndexController@login');   //登陆
});
Route::group(['middleware' => ['web','login'],'prefix'=>'','namespace'=>'Index'], function () {
    Route::get('first','IndexController@first'); // 首页
    Route::get('quit','IndexController@quit'); // 退出
    Route::post('info','IndexController@info'); // 个人票数信息
    Route::get('list','NoteController@notelist'); //投票列表
    Route::post('getNote','NoteController@getNote'); //查询投票人
    Route::get('note','NoteController@note'); //投票页面
    Route::post('noteadd','NoteController@noteadd'); //投票逻辑部分
    Route::get('noteOrder','NoteController@noteOrder'); //投票结果
});

/**
 * 后端
 */
Route::group(['middleware' => ['web'],'namespace'=>'Admin'],function () {
    Route::get('ssadmin', function () { return view('admin.index');}); //登陆首页
    Route::post('login_admin', 'IndexController@login'); //登陆
});
Route::group(['middleware' => ['web','adminLogin'],'prefix'=>'','namespace'=>'Admin'], function () {
    Route::get('index_admin','IndexController@first'); // 首页
    Route::get('quit_sys','IndexController@quit_sys'); // 退出
    Route::get('edit','EditController@edit'); // 系统设置
    Route::post('updateSys','EditController@updateSys'); // 修改系统设置
    Route::get('chooseIndex','EditController@chooseIndex'); // 修改系统设置
    Route::post('addChoose','EditController@addChoose'); // 增加选项
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
