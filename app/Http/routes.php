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
    Route::get('/admin', 'AdminHomeController@index');
    Route::get('/admin/home','AdminHomeController@index');
    Route::get('/admin/register','AdminHomeController@showRegistrationForm');
    Route::post('/admin/register','AdminHomeController@register');

    Route::get('/admin/profile', 'AdminInfoController@getProfile');
    Route::post('/admin/profile', 'AdminInfoController@postProfile');

});
Route::get('/admin/logout','AdminAuthController@logout');

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

Route::auth();

Route::get('/home', 'HomeController@index');
