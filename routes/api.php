<?php

use Illuminate\Http\Request;

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

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

Route::get('redirect/{driver}', 'Auth\RegisterController@redirectToProvider')->name('login.provider')->where('driver', 'google|facebook');
Route::get('callback/{driver}', 'Auth\RegisterController@handleProviderCallback')->name('login.callback')->where('driver', 'google|facebook');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'UserController@details');
});
