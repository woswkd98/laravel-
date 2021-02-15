<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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


// passport와 비슷한거 쓸때 중간에 거쳐가기위한 라우터

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::resources([
    'users' => \App\Http\Controllers\UserController::class
]);

Route::post('users/login', '\App\Http\Controllers\UserController@login');
Route::post('users/register', '\App\Http\Controllers\UserController@store');
Route::get('users/logout/{id}', '\App\Http\Controllers\UserController@logout');
