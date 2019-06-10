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
    Route::prefix('admin')->group(function () {
        Route::namespace('Admin')->group(function () {
            Route::get('/', 'AdminController@index')->name('admin.index');
            Route::get('changelog', 'ChangelogController@index')->name('admin.changelog.index');
        });
    });

    Route::resource('menus', 'MenuController');
    Route::resource('users', 'UserController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('roles', 'RoleController');
    Route::resource('groups', 'GroupController');

    Route::get('/users/{user}/settings', 'UserSettingController@index')->name('users.settings.index');
    Route::get('/users/{user}/settings/create', 'UserSettingController@create')->name('users.settings.create');
    Route::post('/users/{user}/settings', 'UserSettingController@store')->name('users.settings.store');
    Route::get('/users/{user}/settings/{setting}/edit', 'UserSettingController@edit')->name('users.settings.edit');
    Route::put('/users/{user}/settings/{setting}', 'UserSettingController@update')->name('users.settings.update');
    Route::delete('/users/{user}/settings/{setting}', 'UserSettingController@destroy')->name('users.settings.destroy');

    Route::resource('pages', 'PageController');
    //Route::get('pages/{id}/metas', 'PageController@metasIndex');
    //Route::get('pages/{id}/metas/{id}', 'PageMetaController@index');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
