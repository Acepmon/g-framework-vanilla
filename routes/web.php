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

    // Route::resource('menus', 'MenuController');

    // Route::get('/home', 'HomeController@index')->name('home');

    // Route::get('/admin', 'AdminController@index')->name('admin.index');

    // Route::resource('profiles', 'ProfileController');
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('menus', 'MenuController');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::get('/users/{user}/settings', 'UserSettingController@index')->name('users.settings.index');
    Route::get('/users/{user}/settings/create', 'UserSettingController@create')->name('users.settings.create');
    Route::post('/users/{user}/settings', 'UserSettingController@store')->name('users.settings.store');
    Route::get('/users/{user}/settings/{setting}/edit', 'UserSettingController@edit')->name('users.settings.edit');
    Route::put('/users/{user}/settings/{setting}', 'UserSettingController@update')->name('users.settings.update');
    Route::delete('/users/{user}/settings/{setting}', 'UserSettingController@destroy')->name('users.settings.destroy');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
