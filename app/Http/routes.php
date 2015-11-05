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

//Route::get('/','HomeController@index');

Route::get('/', function ()    {
    return view('layouts.main');
});

Route::post('post/image-upload', 'Post\PostController@imageUpload');

Route::resource('category', 'Category\CategoryController');

Route::resource('post', 'Post\PostController');


// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Facebook routes

Route::get('fb-login', 'Facebook\FacebookController@fblogin');

Route::get('fb-callback', 'Facebook\FacebookController@callback');

// LinkedIn routes

Route::get('linkedin-login',"LinkedIn\LinkedInController@linkedInLogin");

Route::get('linkedin-callback',"LinkedIn\LinkedInController@callback");

