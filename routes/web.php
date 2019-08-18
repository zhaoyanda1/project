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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// 商品
Route::get('/goods/goods', 'Goods\GoodsController@goods');      //商品展示
Route::get('/goods/detail', 'Goods\GoodsController@detail');      //商品详情

// 购物车
Route::get('/car/create', 'Car\CarController@create');      //购物车添加
Route::get('/car/car', 'Car\CarController@car');      //购物车列表
Route::get('/car/delete', 'Car\CarController@delete');      //购物车删除

// 订单
Route::get('/order/create', 'Order\OrderController@create');      //生成订单
Route::get('/order/order', 'Order\OrderController@order');      //订单

// 支付
Route::get('/pay/alipay', 'Pay\PayController@pay');      //支付
Route::get('/pay/return', 'Pay\PayController@return');      //回调
Route::get('/pay/notify', 'Pay\PayController@notify');      //异步

Route::get('/task/order_del', 'Task\TaskController@order_del');      //任务
