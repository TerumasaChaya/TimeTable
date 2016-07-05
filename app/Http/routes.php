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


    Route::get('/admin', 'AdminHomeController@index');
    Route::get('/admin/home','AdminHomeController@index');


    //アドミンテスト
    Route::group(['prefix' => 'admin'], function(){



        Route::get('main', function () {
            return view('admin.main');
        });

        Route::get('excel', function () {
            return view('admin.excel');
        });

<<<<<<< HEAD
//
Route::get('/test','WeekDay@getDay');


//ログインテスト
=======
        Route::post('/upload', 'ExcelController@upFile');

    });

});
Route::get('/admin/logout','AdminAuthController@logout');

Route::auth();
Route::get('/home', 'HomeController@index');
/*ログインテスト
>>>>>>> ChayaTimeTable/master
Route::group(['prefix' => 'login'], function(){
    Route::get('user', function () {
        return view('login-user');
    });
    Route::get('admin', function () {
        return view('login-admin');
    });
});
*/

/*ユーザーテスト
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

});
*/

