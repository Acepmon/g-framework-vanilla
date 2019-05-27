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

Route::middleware(['auth'])->group(function () {

    Route::get('/test/blank', function () {
        return view('test.blank');
    });

    Route::get('/test/example', function () {
        return view('test.example');
    });

    Route::get('/test/login', function () {
        return view('test.login');
    });

    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('menus', 'MenuController');
    Route::resource('profiles', 'ProfileController');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
