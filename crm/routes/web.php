<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Index.index');
});

//登陆的视图页面
Route::any('login','Admin\Login@login');

//订单列表
Route::any('orderList','Admin\Order@orderList');

//主题
Route::any('theme','Admin\Login@theme');


