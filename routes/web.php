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
            Route::get('/', function () {
                return redirect()->route('admin.dashboard');
            });
            Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
            Route::get('changelog', 'ChangelogController@index')->name('admin.changelog.index');

            Route::get('install','PluginController@installPlugin')->name('admin.plugins.install');

            Route::get('/menus/tree', 'MenuController@tree')->name('admin.menus.tree');

            Route::prefix('profile')->group(function () {
                Route::get('/', 'ProfileController@index')->name('admin.profile.index');
                Route::put('/', 'ProfileController@update')->name('admin.profile.update');
                Route::get('contents', 'ProfileController@contents')->name('admin.profile.contents.index');
                Route::get('permissions', 'ProfileController@permissions')->name('admin.profile.permissions.index');
                Route::get('settings', 'ProfileController@settings')->name('admin.profile.settings.index');
                Route::get('notifications', 'ProfileController@notifications')->name('admin.profile.notifications.index');
                Route::get('notifications/read', 'ProfileController@readNotifications')->name('admin.profile.notifications.read');
                Route::get('edit', 'ProfileController@edit')->name('admin.profile.edit');
            });

            Route::prefix('configs')->group(function () {
                Route::post('/', 'ConfigController@store')->name('admin.configs.store');
                Route::get('create', 'ConfigController@create')->name('admin.configs.create');
                Route::get('maintenance', 'ConfigController@maintenance')->name('admin.configs.maintenance');
                Route::put('maintenance', 'ConfigController@setMaintenance')->name('admin.configs.maintenance.set');
                Route::get('base', 'ConfigController@base')->name('admin.configs.base');
                Route::put('base', 'ConfigController@updateBase')->name('admin.configs.base.update');
                Route::get('system', 'ConfigController@system')->name('admin.configs.system');
                Route::get('themes', 'ConfigController@themes')->name('admin.configs.themes');
                Route::get('plugins', 'ConfigController@plugins')->name('admin.configs.plugins');
                Route::get('security', 'ConfigController@security')->name('admin.configs.security');
            });

            Route::prefix('logs')->group(function () {
                Route::get('/', 'LogController@index')->name('admin.logs.index');
                Route::delete('{log}', 'LogController@delete')->name('admin.logs.delete');
            });

            Route::prefix('media')->group(function () {
                Route::get('/', 'MediaController@index')->name('admin.media.index');
                Route::get('medias', 'MediaController@medias')->name('admin.media.medias');
                Route::get('avatars', 'MediaController@avatars')->name('admin.media.avatars');
                Route::delete('delete', 'MediaController@delete')->name('admin.media.delete');
                Route::get('thumbnails', 'MediaController@thumbnails')->name('admin.media.thumbnails');
                Route::get('assets', 'MediaController@assets')->name('admin.media.assets');
                Route::get('upload', 'MediaController@upload')->name('admin.media.upload');
            });

            Route::resource('menus', 'MenuController')->names([
                'index' => 'admin.menus.index',
                'create' => 'admin.menus.create',
                'store' => 'admin.menus.store',
                'show' => 'admin.menus.show',
                'edit' => 'admin.menus.edit',
                'update' => 'admin.menus.update',
                'destroy' => 'admin.menus.destroy',
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
            Route::resource('plugins', 'PluginController')->names([
                'index' => 'admin.plugins.index',
                'create' => 'admin.plugins.create',
                'store' => 'admin.plugins.store',
                'show' => 'admin.plugins.show',
                'edit' => 'admin.plugins.edit',
                'update' => 'admin.plugins.update',
                'destroy' => 'admin.plugins.destroy'
            ]);
            Route::post('plugins/{plugin}/activate', 'PluginController@activate')->name('admin.plugins.activate');
            Route::post('plugins/{plugin}/deactivate', 'PluginController@deactivate')->name('admin.plugins.deactivate');
            Route::resource('backups', 'BackupsController')->names([
                'index' => 'admin.backups.index',
                'create' => 'admin.backups.create',
                'store' => 'admin.backups.store',
                'show' => 'admin.backups.show',
                'edit' => 'admin.backups.edit',
                'update' => 'admin.backups.update',
                'destroy' => 'admin.backups.destroy'
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

            Route::get('/groups/{group}/menus/showMenuGroup', 'GroupController@showMenuGroup')->name('admin.groups.showMenuGroup');
            Route::get('/groups/{group}/menus/createMenu/{menu}', 'GroupController@createMenu')->name('admin.groups.createMenu');
            Route::get('/groups/{group}/menus/removeMenu/{menu}', 'GroupController@removeMenu')->name('admin.groups.removeMenu');

            Route::resource('pages', 'PageController')->names([
                'index' => 'admin.pages.index',
                'create' => 'admin.pages.create',
                'store' => 'admin.pages.store',
                'show' => 'admin.pages.show',
                'edit' => 'admin.pages.edit',
                'update' => 'admin.pages.update',
                'destroy' => 'admin.pages.destroy'
            ]);
            Route::resource('contents', 'ContentController')->names([
                'index' => 'admin.contents.index',
                'create' => 'admin.contents.create',
                'store' => 'admin.contents.store',
                'show' => 'admin.contents.show',
                'edit' => 'admin.contents.edit',
                'update' => 'admin.contents.update',
                'destroy' => 'admin.contents.destroy'
            ]);
            Route::resource('configs', 'ConfigController')->names([
                'index' => 'admin.configs.index',
                'create' => 'admin.configs.create',
                'store' => 'admin.configs.store',
                'show' => 'admin.configs.show',
                'edit' => 'admin.configs.edit',
                'update' => 'admin.configs.update',
                'destroy' => 'admin.configs.destroy'
            ]);
            Route::resource('comments', 'CommentController')->names([
                'index' => 'admin.comments.index',
                'create' => 'admin.comments.create',
                'store' => 'admin.comments.store',
                'show' => 'admin.comments.show',
                'edit' => 'admin.comments.edit',
                'update' => 'admin.comments.update',
                'destroy' => 'admin.comments.destroy'
            ]);
            Route::resource('taxonomy', 'TaxonomyController')->names([
                'index' => 'admin.taxonomy.index',
                'create' => 'admin.taxonomy.create',
                'store' => 'admin.taxonomy.store',
                'show' => 'admin.taxonomy.show',
                'edit' => 'admin.taxonomy.edit',
                'update' => 'admin.taxonomy.update',
                'destroy' => 'admin.taxonomy.destroy'
            ]);

            Route::get('/users/{user}/settings', 'UserSettingController@index')->name('admin.users.settings.index');
            Route::get('/users/{user}/settings/create', 'UserSettingController@create')->name('admin.users.settings.create');
            Route::post('/users/{user}/settings', 'UserSettingController@store')->name('admin.users.settings.store');
            Route::get('/users/{user}/settings/{setting}/edit', 'UserSettingController@edit')->name('admin.users.settings.edit');
            Route::put('/users/{user}/settings/{setting}', 'UserSettingController@update')->name('admin.users.settings.update');
            Route::delete('/users/{user}/settings/{setting}', 'UserSettingController@destroy')->name('admin.users.settings.destroy');

            Route::get('/contents/{content}/metas', 'ContentMetaController@index')->name('admin.contents.metas.index');
            Route::get('/contents/{content}/metas/create', 'ContentMetaController@create')->name('admin.contents.metas.create');
            Route::post('/contents/{content}/metas', 'ContentMetaController@store')->name('admin.contents.metas.store');
            Route::get('/contents/{content}/metas/{meta}/edit', 'ContentMetaController@edit')->name('admin.contents.metas.edit');
            Route::put('/contents/{content}/metas/{meta}', 'ContentMetaController@update')->name('admin.contents.metas.update');
            Route::delete('/contents/{content}/metas/{meta}', 'ContentMetaController@destroy')->name('admin.contents.metas.destroy');

            Route::get('/comments/{comment}/metas', 'CommentMetaController@index')->name('admin.comments.metas.index');
            Route::get('/comments/{comment}/metas/create', 'CommentMetaController@create')->name('admin.comments.metas.create');
            Route::post('/comments/{comment}/metas', 'CommentMetaController@store')->name('admin.comments.metas.store');
            Route::get('/comments/{comment}/metas/{meta}/edit', 'CommentMetaController@edit')->name('admin.comments.metas.edit');
            Route::put('/comments/{comment}/metas/{meta}', 'CommentMetaController@update')->name('admin.comments.metas.update');
            Route::delete('/comments/{comment}/metas/{meta}', 'CommentMetaController@destroy')->name('admin.comments.metas.destroy');

            Route::get('/taxonomy/{taxonomy}/metas', 'TermMetaController@index')->name('admin.taxonomy.metas.index');
            Route::get('/taxonomy/{taxonomy}/metas/create', 'TermMetaController@create')->name('admin.taxonomy.metas.create');
            Route::post('/taxonomy/{taxonomy}/metas', 'TermMetaController@store')->name('admin.taxonomy.metas.store');
            Route::get('/taxonomy/{taxonomy}/metas/{meta}/edit', 'TermMetaController@edit')->name('admin.taxonomy.metas.edit');
            Route::put('/taxonomy/{taxonomy}/metas/{meta}', 'TermMetaController@update')->name('admin.taxonomy.metas.update');
            Route::delete('/taxonomy/{taxonomy}/metas/{meta}', 'TermMetaController@destroy')->name('admin.taxonomy.metas.destroy');

            Route::get('/users/{user}/permissions', 'UserPermissionController@index')->name('admin.users.permissions.index');
            Route::get('/users/{user}/permissions/create', 'UserPermissionController@create')->name('admin.users.permissions.create');
            Route::post('/users/{user}/permissions', 'UserPermissionController@store')->name('admin.users.permissions.store');
            Route::get('/users/{user}/permissions/{permission}/edit', 'UserPermissionController@edit')->name('admin.users.permissions.edit');
            Route::put('/users/{user}/permissions/{permission}', 'UserPermissionController@update')->name('admin.users.permissions.update');
            Route::delete('/users/{user}/permissions/{permission}', 'UserPermissionController@destroy')->name('admin.users.permissions.destroy');

            Route::get('/users/{user}/pages', 'UserPageController@index')->name('admin.users.pages.index');
            Route::get('/users/{user}/pages/{page}', 'UserPageController@show')->name('admin.users.pages.show');

            Route::get('/users/{user}/contents', 'UserContentController@index')->name('admin.users.contents.index');
            Route::get('/users/{user}/contents/{content}', 'UserContentController@show')->name('admin.users.contents.show');
            
            Route::delete('/menus/{menu}/groups/{group}', 'MenuController@destroyGroup')->name('admin.menus.groups.destroy');
            Route::get('/menus/{menu}/groups/create', 'MenuController@createGroup')->name('admin.menus.groups.create');
            Route::post('/menus/{menu}/groups', 'MenuController@storeGroup')->name('admin.menus.groups.store');
        });
    });

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/{slug}', 'HomeController@content')->name('content');
