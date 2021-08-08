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

Route::get('/', 'HomeController@index');
Route::get('/tim-kiem', 'HomeController@tim_kiem');
Route::get('/bai-viet/{id}', 'BaivietController@show');
//auth 
Auth::routes();

Route::get('/home', 'LoginController@index')->name('home');


Route::prefix('v1')->group(function(){
    Route::resource('customer', 'Api\v1\CustomerController')->only(['show','update','destroy','store']);
    Route::resource('customer', 'Api\v1\CustomerController')->only(['index']);
    Route::resource('category', 'Api\v1\CategoryPostController');
    Route::resource('post', 'Api\v1\PostController');
    Route::resource('bai-viet', 'Api\v1\BaivietController');
    Route::resource('danh-muc', 'Api\v1\DanhmucController');
});
Route::prefix('v2')->group(function(){
    // Route::resource('customer', 'Api\v1\CustomerController')->only(['show','update','destroy','store']);
    Route::resource('customer', 'Api\v2\CustomerController')->only(['show']);
});
