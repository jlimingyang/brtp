<?php
/**
 * 首页
 */
Route::group(['middleware' => ['web'],'namespace'=>'Index'],function () {
    Route::get('/', 'IndexController@index');   //登录首页
    Route::post('login', 'IndexController@login');   //登陆
});
Route::group(['middleware' => ['web','login'],'prefix'=>'','namespace'=>'Index'], function () {
    Route::get('first','IndexController@first'); // 首页
    Route::get('quit','IndexController@quit'); // 退出
    Route::get('info','IndexController@info'); // 个人票数信息
    Route::get('list','NoteController@notelist'); //投票列表
    Route::post('getNote','NoteController@getNote'); //查询投票人
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
