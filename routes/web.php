<?php

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

Route::get('redirect/{driver}', 'Auth\RegisterController@redirectToProvider')->name('login.provider')->where('driver', 'google|facebook');
Route::get('callback/{driver}', 'Auth\RegisterController@handleProviderCallback')->name('login.callback')->where('driver', 'google|facebook');

Auth::routes(['verify' => true]);
