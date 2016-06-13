<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/excel', 'ExcelController@getFile');

// app/Http/Controllers/deviceController に飛ぶ
Route::get('/', 'deviceController@selectDevice');

//ログインテスト
Route::group(['prefix' => 'login'], function(){
    Route::get('user', function () {
        return view('login-user');
    });
    Route::get('admin', function () {
        return view('login-admin');
    });
});