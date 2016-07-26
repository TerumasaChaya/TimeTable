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

        Route::get('/', 'AdminHomeController@index');
        Route::get('/home','AdminHomeController@index');

        Route::get('excel', function () {
            return view('admin.excel');
        });

        Route::post('/upload', 'ExcelController@upFile');

        Route::get('/register','AdminHomeController@showRegistrationForm');
        Route::post('/register','AdminHomeController@register');

        Route::get('/profile', 'AdminInfoController@getProfile');
        Route::post('/profile', 'AdminInfoController@postProfile');

        Route::get('/logout','AdminAuthController@logout');

        //選択科目の認証
        Route::group(['prefix' => 'elective'], function(){

            Route::get('/', 'ElectiveController@permitSubList');

            //認証待ち 生徒一覧ページ
            Route::get('/studentList/{id}', 'ElectiveController@studentList');

            //認証確認
            Route::post('/result', 'ElectiveController@result');

            //認証した生徒の承認フラグを更新(true)
            Route::post('/update', 'ElectiveController@update');

            //認証済み生徒一覧表示
            Route::get('/authorized/{id}','ElectiveController@authorized');

            //削除確認
            Route::post('/delConfirm','ElectiveController@delConfirm');

            //認証した生徒の承認フラグを更新(false)
            Route::post('/delete','ElectiveController@delete');

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

    Route::group(['prefix' => 'admin/teacher'], function(){
        Route::get('/', 'adminTeacherController@index');
        Route::get('/edit/{id}', 'adminTeacherController@edit');
        Route::post('/upImg', 'adminTeacherController@setTeacherImage');
    });


    Route::get('/admin/logout','AdminAuthController@logout');

        Route::group(['prefix' => 'teacher'], function(){
            Route::get('/', 'adminTeacherController@index');
            Route::get('/edit/{id}', 'adminTeacherController@edit');
            Route::post('/upImg', 'adminTeacherController@setTeacherImage');
        });
    });
});

Route::auth();
Route::get('/home', 'DataBaseControllers\TestDataBaseController@test');

Route::group(['prefix' => 'image'], function(){
    Route::get('teacherImage/{name}', 'ImageController@teacherImage');
});

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'user'], function () {

        Route::group(['prefix' => 'attendance'], function () {
            Route::get('/', 'attendanceController@index');
            Route::post('/show', 'attendanceController@show');
        });

        Route::get('/week', 'DataBaseControllers\TestDataBaseController@test');

        //授業の詳細ページ表示
        Route::get('/SubjectInfo/{id}', 'DataBaseControllers\Day@getInfo');

        Route::get('/day', 'DataBaseControllers\Day@getDay');

        //授業の詳細ページ表示
        Route::get('/subjectinfo/{id}', 'DataBaseControllers\Day@getInfo');

        //教室一覧ページ
        Route::get('/roomlist', 'DataBaseControllers\RoomInfo@getRoomList');

        //教室詳細
        Route::get('/roominfo/{id}', 'DataBaseControllers\RoomInfo@getRoomInfo');

        Route::group(['prefix' => 'teacher'], function () {
            Route::get('/', 'userTeacherController@index');
            Route::get('/detail/{id}', 'userTeacherController@detail');
//        Route::post('/upImg', 'userTeacherController@setTeacherImage');
        });

        //選択科目の申請
        Route::group(['prefix' => 'elective'], function () {
            Route::get('/', 'ElectiveController@index');

            //データベース登録確認
            Route::get('/confirm/{id}', 'ElectiveController@appConfirm');

            //データベース登録ページ
            Route::get('/insert/{id}', 'ElectiveController@insert');

        });

        //申請済み選択科目
        Route::group(['prefix' => 'app'], function () {
            //申し込み済み選択科目 確認
            Route::get('/', 'ElectiveController@appList');
            Route::post('/appDelConfirm', 'ElectiveController@appDelConfirm');
        });

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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile', 'UserInfoController@getProfile');
    Route::post('/profile', 'UserInfoController@postProfile');
});

