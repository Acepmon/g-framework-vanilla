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
            Route::post('contents/', 'ContentController@store');
            Route::put('contents/{contentId}', 'ContentController@updateContent');
            Route::post('contents/{contentId}/metas', 'ContentMetaController@createMeta');
            Route::put('contents/{contentId}/metas', 'ContentMetaController@updateMeta');
            Route::put('contents/{contentId}/metas/sync', 'ContentMetaController@syncMetas');
            Route::put('contents/{contentId}/metas/attach', 'ContentMetaController@attachMetas');
            Route::put('contents/{contentId}/metas/detach', 'ContentMetaController@detachMetas');
            Route::delete('contents/{contentId}/metas', 'ContentMetaController@deleteMeta');

        });
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
