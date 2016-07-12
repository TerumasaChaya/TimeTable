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

//Route::get('/excel', 'ExcelController@getFile');

// app/Http/Controllers/deviceController に飛ぶ
Route::get('/', function(){
    return view('auth.login-new');
});

Route::group(['middleware' => 'guest:admin'], function () { //←このグループで括る
    Route::get('/admin/login','AdminAuthController@showLoginForm');
    Route::post('/admin/login','AdminAuthController@login');
});

Route::group(['middleware' => 'auth:admin'], function () { //←このグループで括る

    //アドミンテスト
    Route::group(['prefix' => 'admin'], function(){

        Route::get('/', 'AdminHomeController@index');
        Route::get('/home','AdminHomeController@index');

        Route::get('excel', function () {
            return view('admin.excel');
        });

        Route::post('/upload', 'ExcelController@upFile');

    });

});
Route::get('/admin/logout','AdminAuthController@logout');
Route::auth();
Route::get('/home', 'HomeController@index');

//ユーザーテスト
Route::group(['prefix' => 'user'], function(){

    Route::group(['prefix' => 'attendance'], function(){
        Route::get('/', 'attendanceController@index');
        Route::post('/show', 'attendanceController@show');
    });

    Route::get('week', function () {
        return view('user.week');
    });

    Route::get('main', function () {
        return view('user.main');
    });

    //1日時間割表示ページ
    Route::get('/Day','Day@getDay');

    //授業の詳細ページ表示
    Route::get('/SubjectInfo/{id}','Day@getInfo');

});
