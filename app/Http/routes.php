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


Route::get('/test2','DataBaseControllers\TestDataBaseController@test');



//ログインテスト
Route::group(['prefix' => 'login'], function(){
    Route::get('user', function () {
        return view('login-user');
    });
    Route::get('admin', function () {
        return view('login-admin');
    });
});

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
    Route::get('/day','DataBaseControllers\Day@getDay');

    //授業の詳細ページ表示
    Route::get('/subjectinfo/{id}','DataBaseControllers\Day@getInfo');

    //教室一覧ページ
    Route::get('/roomlist','DataBaseControllers\RoomInfo@getRoomList');

    //教室詳細
    Route::get('/roominfo/{id}','DataBaseControllers\RoomInfo@getRoomInfo');

});

//アドミンテスト
Route::group(['prefix' => 'admin'], function(){

    Route::get('main', function () {
        return view('admin.main');
    });
});
