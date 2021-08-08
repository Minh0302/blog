<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('/','HomeController@index');

Route::prefix('v1')->group(function(){
    Route::resource('customer', 'Api\v1\CustomerController')->only(['show','update','destroy','store']);
    Route::resource('customer', 'Api\v1\CustomerController')->only(['index']);
    Route::resource('category', 'Api\v1\CategoryPostController');
});
Route::prefix('v2')->group(function(){
    // Route::resource('customer', 'Api\v1\CustomerController')->only(['show','update','destroy','store']);
    Route::resource('customer', 'Api\v2\CustomerController')->only(['show']);
});
