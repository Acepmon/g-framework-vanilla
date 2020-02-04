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
    Route::prefix('ajax')->group(function () {
        Route::namespace('Ajax')->group(function () {

            Route::get('contents/', 'ContentController@index');
            Route::put('contents/{contentId}', 'ContentController@update');
            Route::delete('contents/{contentId}', 'ContentController@destroy');
            Route::post('contents/{contentId}/publish', 'ContentController@publish');
            Route::post('contents/{contentId}/metas', 'ContentMetaController@createMeta');
            Route::put('contents/{contentId}/metas', 'ContentMetaController@updateMeta');
            Route::put('contents/{contentId}/metas/sync', 'ContentMetaController@syncMetas');
            Route::put('contents/{contentId}/metas/attach', 'ContentMetaController@attachMetas');
            Route::put('contents/{contentId}/metas/detach', 'ContentMetaController@detachMetas');
            Route::delete('contents/{contentId}/metas', 'ContentMetaController@deleteMeta');
            Route::post('/contents/{contentId}/medias', 'ContentController@attachMedias');
            Route::post('/contents/{contentId}/medias/delete', 'ContentController@detachMedias');
            Route::post('/contents/{contentId}/doc', 'ContentController@attachDoc');

            Route::prefix('users')->group(function () {
                Route::get('', 'UserController@index')->name('ajax.users.index');
                Route::post('', 'UserController@store')->name('ajax.users.store');
                Route::put('{user}', 'UserController@update')->name('ajax.users.update');
                Route::delete('{user}', 'UserController@destroy')->name('ajax.users.destroy');
            });

            Route::prefix('groups')->group(function () {
                Route::get('', 'GroupController@index')->name('ajax.groups.index');
                Route::post('', 'GroupController@store')->name('ajax.groups.store');
                Route::put('{id}', 'GroupController@update')->name('ajax.groups.update');
                Route::delete('{id}', 'GroupController@destroy')->name('ajax.groups.destroy');
            });
        });
    });
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::namespace('Admin')->group(function () {
            Route::prefix('contents')->group(function () {
                Route::get('{content}/revisions/{revision}/revert', 'ContentController@revert')->name('admin.contents.revisions.revert');
                Route::get('{content}/revisions/{revision}', 'ContentController@viewRevision')->name('admin.contents.revisions.show');
                Route::put('{content}/revisions', 'ContentController@updateRevision')->name('admin.contents.revisions.update');

                Route::get('{content}/metas', 'ContentMetaController@index')->name('admin.contents.metas.index');
                Route::get('{content}/metas/create', 'ContentMetaController@create')->name('admin.contents.metas.create');
                Route::post('{content}/metas', 'ContentMetaController@store')->name('admin.contents.metas.store');
                Route::get('{content}/metas/{meta}/edit', 'ContentMetaController@edit')->name('admin.contents.metas.edit');
                Route::put('{content}/metas/{meta}', 'ContentMetaController@update')->name('admin.contents.metas.update');
                Route::delete('{content}/metas/{meta}', 'ContentMetaController@destroy')->name('admin.contents.metas.destroy');

                Route::get('', 'ContentController@index')->name('admin.contents.index');
                Route::get('create', 'ContentController@create')->name('admin.contents.create');
                Route::post('', 'ContentController@store')->name('admin.contents.store');
                Route::get('{content}', 'ContentController@show')->name('admin.contents.show');
                Route::get('{content}/edit', 'ContentController@edit')->name('admin.contents.edit');
                Route::put('{content}', 'ContentController@update')->name('admin.contents.update');
                Route::delete('{content}', 'ContentController@destroy')->name('admin.contents.destroy');
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

            Route::prefix('comments')->group(function () {
                Route::get('{comment}/metas', 'CommentMetaController@index')->name('admin.comments.metas.index');
                Route::get('{comment}/metas/create', 'CommentMetaController@create')->name('admin.comments.metas.create');
                Route::post('{comment}/metas', 'CommentMetaController@store')->name('admin.comments.metas.store');
                Route::get('{comment}/metas/{meta}/edit', 'CommentMetaController@edit')->name('admin.comments.metas.edit');
                Route::put('{comment}/metas/{meta}', 'CommentMetaController@update')->name('admin.comments.metas.update');
                Route::delete('{comment}/metas/{meta}', 'CommentMetaController@destroy')->name('admin.comments.metas.destroy');

                Route::get('', 'CommentController@index')->name('admin.comments.index');
                Route::get('create', 'CommentController@create')->name('admin.comments.create');
                Route::post('', 'CommentController@store')->name('admin.comments.store');
                Route::get('{comment}', 'CommentController@show')->name('admin.comments.show');
                Route::get('{comment}/edit', 'CommentController@edit')->name('admin.comments.edit');
                Route::put('{comment}', 'CommentController@update')->name('admin.comments.update');
                Route::delete('{comment}', 'CommentController@destroy')->name('admin.comments.destroy');
            });

            Route::prefix('taxonomy')->group(function () {
                Route::get('{taxonomy}/metas', 'TermMetaController@index')->name('admin.taxonomy.metas.index');
                Route::get('{taxonomy}/metas/create', 'TermMetaController@create')->name('admin.taxonomy.metas.create');
                Route::post('{taxonomy}/metas', 'TermMetaController@store')->name('admin.taxonomy.metas.store');
                Route::get('{taxonomy}/metas/{meta}/edit', 'TermMetaController@edit')->name('admin.taxonomy.metas.edit');
                Route::put('{taxonomy}/metas/{meta}', 'TermMetaController@update')->name('admin.taxonomy.metas.update');
                Route::delete('{taxonomy}/metas/{meta}', 'TermMetaController@destroy')->name('admin.taxonomy.metas.destroy');

                Route::get('', 'TaxonomyController@index')->name('admin.taxonomy.index');
                Route::get('create', 'TaxonomyController@create')->name('admin.taxonomy.create');
                Route::post('', 'TaxonomyController@store')->name('admin.taxonomy.store');
                Route::get('{taxonomy}', 'TaxonomyController@show')->name('admin.taxonomy.show');
                Route::get('{taxonomy}/edit', 'TaxonomyController@edit')->name('admin.taxonomy.edit');
                Route::put('{taxonomy}', 'TaxonomyController@update')->name('admin.taxonomy.update');
                Route::delete('{taxonomy}', 'TaxonomyController@destroy')->name('admin.taxonomy.destroy');
            });

            Route::prefix('localizations')->group(function () {
                Route::get('', 'LocalizationController@index')->name('admin.localizations.index');
                Route::get('create', 'LocalizationController@create')->name('admin.localizations.create');
                Route::post('', 'LocalizationController@store')->name('admin.localizations.store');
                Route::get('{localization}', 'LocalizationController@show')->name('admin.localizations.show');
                Route::get('{localization}/edit', 'LocalizationController@edit')->name('admin.localizations.edit');
                Route::put('{localization}', 'LocalizationController@update')->name('admin.localizations.update');
                Route::delete('{localization}', 'LocalizationController@destroy')->name('admin.localizations.destroy');
            });
        });
    });
});

Route::prefix('ajax')->group(function () {
    Route::namespace('Ajax')->group(function () {
        Route::post('contents/', 'ContentController@store')->name('ajax.contents.store');
    });
});
Route::get('/', [
    'uses' => 'PublicController@homepage',
    'as' => 'home',
]);
Route::any('{uri}', [
    'uses' => 'PublicController@uri',
    'as' => 'page',
])->where('uri', '.*');
