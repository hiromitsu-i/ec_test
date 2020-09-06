<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/itemdetail/{id}','ItemController@itemDetail')->name('itemDetail');
//ショッピングカート
Route::get('/cart', 'ItemController@cart');
//カート全削除
Route::get('/cart/reset', 'ItemController@reset');
//アイテム1つ削除
Route::get('/cart/remove/{id}', 'ItemController@remove');
//アイテム１つ追加
Route::get('/cart/{id}', 'ItemController@itemAddCart');
//決済
Route::post('/payment', 'PaymentController@payment')->name('payment');
//決済完了
Route::post('/payment/complete', 'PaymentController@complete')->name('payment_complete');

