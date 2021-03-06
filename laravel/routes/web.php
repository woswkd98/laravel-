<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', function () {
    return 'test1';
});
Route::get('kakao/login', 'App\Http\Controllers\kakaoLogin\LoginController@redirect');
Route::get('login', 'App\Http\Controllers\LoginControllers\SocialLogin\kakaoLogin\LoginController@loginView');
Route::get('kakao/redirection','App\Http\Controllers\LoginControllers\SocialLogin\kakaoLogin\LoginController@getAccessToken');
Route::get('getUser','App\Http\Controllers\LoginControllers\SocialLogin\kakaoLogin\LoginController@getUser');
