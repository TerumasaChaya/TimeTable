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
Route::get('/', function(){
    return view('auth.login-new');
});

Route::group(['middleware' => 'guest:admin'], function () { //←このグループで括る
    Route::get('/admin/login','AdminAuthController@showLoginForm');
    Route::post('/admin/login','AdminAuthController@login');
    Route::post('/admin/password/email', 'AdminPasswordController@sendResetLinkEmail');
    Route::post('/admin/password/reset', 'AdminPasswordController@reset');
    Route::get('/admin/password/reset/{token?}', 'AdminPasswordController@showResetForm');
});

Route::group(['middleware' => 'auth:admin'], function () { //←このグループで括る


    //アドミン
    Route::group(['prefix' => 'admin'], function(){

        Route::get('/', 'AdminHomeController@index');
        Route::get('/home','AdminHomeController@index');
        
        Route::get('main', function () {
            return view('admin.main');
        });

        Route::get('excel', function () {
            return view('admin.excel');
        });

        Route::get('delete', function () {
            return view('admin.delete');
        });

        Route::post('/upload', 'ExcelController@upFile');

        Route::get('/register','AdminHomeController@showRegistrationForm');
        Route::post('/register','AdminHomeController@register');

        Route::get('/profile', 'AdminInfoController@getProfile');
        Route::post('/profile', 'AdminInfoController@postProfile');


        Route::get('/logout','AdminAuthController@logout');

        Route::post('/delete/', 'ExcelController@delData');

    });

    Route::group(['prefix' => 'admin/teacher'], function(){
        Route::get('/', 'adminTeacherController@index');
        Route::get('/edit/{id}', 'adminTeacherController@edit');
        Route::post('/upImg', 'adminTeacherController@setTeacherImage');
    });
});


Route::get('/admin/logout','AdminAuthController@logout');

Route::auth();
Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'image'], function(){
    Route::get('teacherImage/{name}', 'ImageController@teacherImage');

});


Route::group(['prefix' => 'user'], function(){

    Route::group(['prefix' => 'attendance'], function(){
        Route::get('/', 'attendanceController@index');
        Route::post('/show', 'attendanceController@show');
    });

    Route::get('/week', 'DataBaseControllers\TestDataBaseController@test');

    //1日時間割表示ページ
    Route::get('/Day','Day@getDay');

    //授業の詳細ページ表示
    Route::get('/SubjectInfo/{id}','DataBaseControllers\Day@getInfo');

    Route::get('/day','DataBaseControllers\Day@getDay');

    //授業の詳細ページ表示
    Route::get('/subjectinfo/{id}','DataBaseControllers\Day@getInfo');

    //教室一覧ページ
    Route::get('/roomlist','DataBaseControllers\RoomInfo@getRoomList');

    //教室詳細
    Route::get('/roominfo/{id}','DataBaseControllers\RoomInfo@getRoomInfo');

    Route::group(['prefix' => 'teacher'], function(){
        Route::get('/', 'userTeacherController@index');
        Route::get('/detail/{id}', 'userTeacherController@detail');
//        Route::post('/upImg', 'userTeacherController@setTeacherImage');
    });
});



Route::group(['middleware' => 'guest:user'], function() {
    Route::get('/login', 'Auth\AuthController@showLoginForm');
    Route::post('/login', 'Auth\AuthController@login');
    Route::get('/logout', 'Auth\AuthController@logout');
    Route::post('/password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'Auth\PasswordController@reset');
    Route::get('/password/reset/{token?}', 'Auth\PasswordController@showResetForm');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile', 'UserInfoController@getProfile');
    Route::post('/profile', 'UserInfoController@postProfile');
});


