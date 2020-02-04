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

use Illuminate\Http\Request;

if (!file_exists(base_path('.env')) && config('app.env_install')) {
    \Artisan::call('env:install');
}

Route::prefix('ajax')->group(function () {
    Route::namespace('Ajax')->group(function () {

        Route::get('user_exists', function (Request $request) {
            return response()->json([
                'status' => \App\User::where('email', $request->input('email'))->count() > 0 ? true : false
            ]);
        });

    });
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::namespace('Admin')->group(function () {

            Route::get('', function () {
                return redirect()->route('admin.dashboard');
            });

            Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
            Route::get('changelog', 'ChangelogController@index')->name('admin.changelog');

            Route::get('databaseRestore','BackupController@databaseRestore')->name('admin.backups.databaseRestore');

            Route::prefix('profile')->group(function () {
                Route::get('/', 'ProfileController@index')->name('admin.profile.index');
                Route::put('/', 'ProfileController@update')->name('admin.profile.update');
                Route::get('contents', 'ProfileController@contents')->name('admin.profile.contents.index');
                Route::get('permissions', 'ProfileController@permissions')->name('admin.profile.permissions.index');
                Route::get('notifications', 'ProfileController@notifications')->name('admin.profile.notifications.index');
                Route::get('notifications/read', 'ProfileController@readNotifications')->name('admin.profile.notifications.read');
                Route::get('edit', 'ProfileController@edit')->name('admin.profile.edit');
            });

            Route::prefix('configs')->group(function () {
                Route::get('maintenance', 'ConfigController@maintenance')->name('admin.configs.maintenance');
                Route::post('maintenance', 'ConfigController@setMaintenance')->name('admin.configs.maintenance.set');
                Route::get('base', 'ConfigController@base')->name('admin.configs.base');
                Route::put('base', 'ConfigController@updateBase')->name('admin.configs.base.update');
            });

            Route::prefix('logs')->group(function () {
                Route::get('ajax/list', 'LogController@ajaxLogsList')->name('admin.logs.ajax.list');
                Route::get('ajax/{id}', 'LogController@ajaxLogDetails')->name('admin.logs.ajax.details');

                Route::get('/', 'LogController@reader')->name('admin.logs.index');
                Route::get('/downloadAll', 'LogController@downloadAll')->name('admin.logs.downloadAll');
                Route::delete('/', 'LogController@deleteAll')->name('admin.logs.deleteAll');
                Route::delete('{log}', 'LogController@delete')->name('admin.logs.delete');
            });

            Route::prefix('menus')->group(function () {
                Route::get('tree', 'MenuController@tree')->name('admin.menus.tree');
                Route::put('tree', 'MenuController@updateTree')->name('admin.menus.tree.update');

                Route::get('', 'MenuController@index')->name('admin.menus.index');
                Route::get('create', 'MenuController@create')->name('admin.menus.create');
                Route::post('', 'MenuController@store')->name('admin.menus.store');
                Route::get('{menu}', 'MenuController@show')->name('admin.menus.show');
                Route::get('{menu}/edit', 'MenuController@edit')->name('admin.menus.edit');
                Route::put('{menu}', 'MenuController@update')->name('admin.menus.update');
                Route::delete('{menu}', 'MenuController@destroy')->name('admin.menus.destroy');
            });

            Route::prefix('users')->group(function () {
                Route::get('administrators', 'UserController@administrators')->name('admin.users.administrators');
                Route::get('operators', 'UserController@operators')->name('admin.users.operators');
                Route::get('guests', 'UserController@guests')->name('admin.users.guests');

                Route::get('{user}/permissions', 'UserPermissionController@index')->name('admin.users.permissions.index');
                Route::get('{user}/permissions/create', 'UserPermissionController@create')->name('admin.users.permissions.create');
                Route::post('{user}/permissions', 'UserPermissionController@store')->name('admin.users.permissions.store');
                Route::get('{user}/permissions/{permission}/edit', 'UserPermissionController@edit')->name('admin.users.permissions.edit');
                Route::put('{user}/permissions/{permission}', 'UserPermissionController@update')->name('admin.users.permissions.update');
                Route::delete('{user}/permissions/{permission}', 'UserPermissionController@destroy')->name('admin.users.permissions.destroy');

                Route::get('{user}/groups', 'UserGroupController@index')->name('admin.users.groups.index');
                Route::get('{user}/groups/create', 'UserGroupController@create')->name('admin.users.groups.create');
                Route::post('{user}/groups', 'UserGroupController@store')->name('admin.users.groups.store');
                Route::get('{user}/groups/{group}/edit', 'UserGroupController@edit')->name('admin.users.groups.edit');
                Route::put('{user}/groups/{group}', 'UserGroupController@update')->name('admin.users.groups.update');
                Route::delete('{user}/groups/{group}', 'UserGroupController@destroy')->name('admin.users.groups.destroy');

                Route::get('{user}/contents', 'UserContentController@index')->name('admin.users.contents.index');
                Route::get('{user}/contents/{content}', 'UserContentController@show')->name('admin.users.contents.show');

                Route::get('', 'UserController@index')->name('admin.users.index');
                Route::get('create', 'UserController@create')->name('admin.users.create');
                Route::post('', 'UserController@store')->name('admin.users.store');
                Route::get('{user}', 'UserController@show')->name('admin.users.show');
                Route::get('{user}/edit', 'UserController@edit')->name('admin.users.edit');
                Route::put('{user}', 'UserController@update')->name('admin.users.update');
                Route::delete('{user}', 'UserController@destroy')->name('admin.users.destroy');
            });

            Route::prefix('permissions')->group(function () {
                Route::get('', 'PermissionController@index')->name('admin.permissions.index');
                Route::get('create', 'PermissionController@create')->name('admin.permissions.create');
                Route::post('', 'PermissionController@store')->name('admin.permissions.store');
                Route::get('{permission}', 'PermissionController@show')->name('admin.permissions.show');
                Route::get('{permission}/edit', 'PermissionController@edit')->name('admin.permissions.edit');
                Route::put('{permission}', 'PermissionController@update')->name('admin.permissions.update');
                Route::delete('{permission}', 'PermissionController@destroy')->name('admin.permissions.destroy');
            });

            Route::prefix('backups')->group(function () {
                Route::get('', 'BackupController@index')->name('admin.backups.index');
                Route::get('create', 'BackupController@create')->name('admin.backups.create');
                Route::post('', 'BackupController@store')->name('admin.backups.store');
                Route::get('{backup}', 'BackupController@show')->name('admin.backups.show');
                Route::get('{backup}/edit', 'BackupController@edit')->name('admin.backups.edit');
                Route::put('{backup}', 'BackupController@update')->name('admin.backups.update');
                Route::delete('{backup}', 'BackupController@destroy')->name('admin.backups.destroy');
            });

            Route::prefix('themes')->group(function () {
                Route::get('{theme}/layouts/{name}', 'ThemeController@editLayout')->name('admin.themes.layouts.edit');
                Route::put('{theme}/layouts/{name}', 'ThemeController@updateLayout')->name('admin.themes.layouts.update');
                Route::get('{theme}/includes/{name}', 'ThemeController@editInclude')->name('admin.themes.includes.edit');
                Route::put('{theme}/includes/{name}', 'ThemeController@updateInclude')->name('admin.themes.includes.update');
                Route::post('{theme}/activate', 'ThemeController@activate')->name('admin.themes.activate');
                Route::post('{theme}/deactivate', 'ThemeController@deactivate')->name('admin.themes.deactivate');

                Route::get('', 'ThemeController@index')->name('admin.themes.index');
                Route::get('create', 'ThemeController@create')->name('admin.themes.create');
                Route::post('', 'ThemeController@store')->name('admin.themes.store');
                Route::get('{theme}', 'ThemeController@show')->name('admin.themes.show');
                Route::get('{theme}/edit', 'ThemeController@edit')->name('admin.themes.edit');
                Route::put('{theme}', 'ThemeController@update')->name('admin.themes.update');
                Route::delete('{theme}', 'ThemeController@destroy')->name('admin.themes.destroy');
            });

            Route::prefix('groups')->group(function () {
                Route::get('{group}/menus/showMenuGroup', 'GroupController@showMenuGroup')->name('admin.groups.showMenuGroup');
                Route::get('{group}/menus/createMenu/{menu}', 'GroupController@createMenu')->name('admin.groups.createMenu');
                Route::get('{group}/menus/removeMenu/{menu}', 'GroupController@removeMenu')->name('admin.groups.removeMenu');

                Route::get('{group}/users/showUserGroup', 'GroupController@showUserGroup')->name('admin.groups.showUserGroup');
                Route::get('{group}/users/createUser/{user}', 'GroupController@createUser')->name('admin.groups.createUser');
                Route::get('{group}/users/removeUser/{user}', 'GroupController@removeUser')->name('admin.groups.removeUser');

                Route::get('{group}/permissions/showPermissionGroup', 'GroupController@showPermissionGroup')->name('admin.groups.showPermissionGroup');
                Route::get('{group}/permissions/createPermission/{permission}', 'GroupController@createPermission')->name('admin.groups.createPermission');
                Route::get('{group}/permissions/removePermission/{permission}', 'GroupController@removePermission')->name('admin.groups.removePermission');

                Route::get('', 'GroupController@index')->name('admin.groups.index');
                Route::get('create', 'GroupController@create')->name('admin.groups.create');
                Route::post('', 'GroupController@store')->name('admin.groups.store');
                Route::get('{group}', 'GroupController@show')->name('admin.groups.show');
                Route::get('{group}/edit', 'GroupController@edit')->name('admin.groups.edit');
                Route::put('{group}', 'GroupController@update')->name('admin.groups.update');
                Route::delete('{group}', 'GroupController@destroy')->name('admin.groups.destroy');
            });

        });
    });
});
