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

            Route::resource('menus', 'MenuController')->names([
                'index' => 'admin.menus.index',
                'create' => 'admin.menus.create',
                'store' => 'admin.menus.store',
                'show' => 'admin.menus.show',
                'edit' => 'admin.menus.edit',
                'update' => 'admin.menus.update',
                'destroy' => 'admin.menus.destroy'
            ]);
            Route::resource('users', 'UserController')->names([
                'index' => 'admin.users.index',
                'create' => 'admin.users.create',
                'store' => 'admin.users.store',
                'show' => 'admin.users.show',
                'edit' => 'admin.users.edit',
                'update' => 'admin.users.update',
                'destroy' => 'admin.users.destroy'
            ]);
            Route::resource('permissions', 'PermissionController')->names([
                'index' => 'admin.permissions.index',
                'create' => 'admin.permissions.create',
                'store' => 'admin.permissions.store',
                'show' => 'admin.permissions.show',
                'edit' => 'admin.permissions.edit',
                'update' => 'admin.permissions.update',
                'destroy' => 'admin.permissions.destroy'
            ]);
            Route::resource('roles', 'RoleController')->names([
                'index' => 'admin.roles.index',
                'create' => 'admin.roles.create',
                'store' => 'admin.roles.store',
                'show' => 'admin.roles.show',
                'edit' => 'admin.roles.edit',
                'update' => 'admin.roles.update',
                'destroy' => 'admin.roles.destroy'
            ]);
            Route::resource('groups', 'GroupController')->names([
                'index' => 'admin.groups.index',
                'create' => 'admin.groups.create',
                'store' => 'admin.groups.store',
                'show' => 'admin.groups.show',
                'edit' => 'admin.groups.edit',
                'update' => 'admin.groups.update',
                'destroy' => 'admin.groups.destroy'
            ]);
            Route::resource('pages', 'PageController')->names([
                'index' => 'admin.pages.index',
                'create' => 'admin.pages.create',
                'store' => 'admin.pages.store',
                'show' => 'admin.pages.show',
                'edit' => 'admin.pages.edit',
                'update' => 'admin.pages.update',
                'destroy' => 'admin.pages.destroy'
            ]);
        
            Route::get('/users/{user}/settings', 'UserSettingController@index')->name('users.settings.index');
            Route::get('/users/{user}/settings/create', 'UserSettingController@create')->name('users.settings.create');
            Route::post('/users/{user}/settings', 'UserSettingController@store')->name('users.settings.store');
            Route::get('/users/{user}/settings/{setting}/edit', 'UserSettingController@edit')->name('users.settings.edit');
            Route::put('/users/{user}/settings/{setting}', 'UserSettingController@update')->name('users.settings.update');
            Route::delete('/users/{user}/settings/{setting}', 'UserSettingController@destroy')->name('users.settings.destroy');
        });
    });

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
