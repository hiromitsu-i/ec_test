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
    return view('auth.login');
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


Route::middleware('cms')->group(function(){
    Route::get('/cms','CmsController@index')->name('cms_index');
    Route::get('/cms/item_edit/{item_id}','CmsController@item_edit')->name('item_edit');
    Route::post('/cms/item_complete','CmsController@item_complete')->name('item_complete');
    Route::get('/cms/item_delete/{item_id}','CmsController@item_delete')->name('item_delete');
    Route::get('/cms/item_create','CmsController@item_create')->name('item_create');
    Route::post('/cms/item_create','CmsController@item_create');
});
