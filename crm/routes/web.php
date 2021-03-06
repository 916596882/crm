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
    return view('Login.login');
});

//登陆的视图页面
Route::any('login','Admin\Login@login');

//订单列表
Route::any('orderList','Admin\Order@orderList');

//主题
Route::any('theme','Admin\Login@theme');

//管理员列表
Route::any('adminList','Admin\Admin@adminList');

//管理员添加
Route::any('adminAdd','Admin\Admin@adminAdd');

//产品列表
Route::any('productList','Admin\Product@productList');

//产品添加
Route::any('productAdd','Admin\Product@productAdd');


//跟踪订单列表
Route::any('tailOrder','Admin\Tail@tailList');

//跟踪订单添加
Route::any('tailAdd','Admin\Tail@tailAdd');

//费用列表
Route::any('costList','Admin\Cost@costList');

//费用添加
Route::any('addCost','Admin\Cost@addCost');


//售后列表
Route::any('afterList','Admin\After@afterList');

//售后添加
Route::any('afterAdd','Admin\After@afterAdd');

//客户
Route::any('userList','Admin\User@userList');

//客户添加
Route::any('userAdd','Admin\User@userAdd');

//KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK
//所有的删除
Route::any('delete','Admin\Common@delete_info');

//产品修改
Route::any('productSave','Admin\Product@productSave');

//自动识别产品
Route::any('autoProduct','Admin\Cost@autoProduct');

//生成订单
Route::any('createOrder','Admin\Order@createOrder');


Route::any('orderList','Admin\Order@orderList');









































//WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW
//三级联动
Route::any('finds','Admin\User@finds');
//用户添加
Route::any('insert','Admin\User@insert');
//用户列表userList
Route::any('userLists','Admin\User@userLists');
//售后添加
Route::any('afterAddDo','Admin\After@afterAddDo');
//售后展示
Route::any('afterListDo','Admin\After@afterListDo');
//售后修改
Route::any('afterUpdate','Admin\After@afterUpdate');
//用户修改userUpdate
Route::any('userUpdate','Admin\User@userUpdate');
//首页
Route::any('index', function () {
    return view('Index.index');
});





















































//JJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJ
//执行跟踪订单
Route::any('tailListDo','Admin\Tail@tailListDo');

//跟踪订单即点即改
Route::any('tailSave','Admin\Tail@tailSave');

//费用添加
Route::any('addCost','Admin\Cost@addCost');

//费用的展示
Route::any('costListDo','Admin\Cost@costListDo');

