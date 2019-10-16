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

            Route::get('contents/', 'ContentController@index')->name('ajax.contents.index');
            Route::put('contents/{contentId}', 'ContentController@updateContent')->name('ajax.contents.update');
            Route::post('contents/{contentId}/metas', 'ContentMetaController@createMeta')->name('ajax.contents.metas.store');
            Route::put('contents/{contentId}/metas', 'ContentMetaController@updateMeta')->name('ajax.contents.metas.update');
            Route::put('contents/{contentId}/metas/sync', 'ContentMetaController@syncMetas')->name('ajax.contents.metas.sync');
            Route::put('contents/{contentId}/metas/attach', 'ContentMetaController@attachMetas')->name('ajax.contents.metas.attach');
            Route::put('contents/{contentId}/metas/detach', 'ContentMetaController@detachMetas')->name('ajax.contents.metas.detach');
            Route::delete('contents/{contentId}/metas', 'ContentMetaController@deleteMeta')->name('ajax.contents.metas.delete');

            Route::prefix('users')->group(function () {
                Route::get('', 'UserController@index')->name('ajax.users.index');
                Route::post('', 'UserController@store')->name('ajax.users.store');
                Route::put('{user}', 'UserController@update')->name('ajax.users.update');
                Route::delete('{user}', 'UserController@destroy')->name('ajax.users.destroy');
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
