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

Route::prefix('advertisement')->group(function() {
    Route::get('/', 'AdvertisementController@index');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::namespace('Admin')->group(function () {

            Route::prefix('banners')->group(function () {
                Route::prefix('locations')->group(function () {
                    Route::get('', 'BannerLocationController@index')->name('admin.banners.locations.index');
                    Route::get('create', 'BannerLocationController@create')->name('admin.banners.locations.create');
                    Route::post('', 'BannerLocationController@store')->name('admin.banners.locations.store');
                    Route::get('{location}', 'BannerLocationController@show')->name('admin.banners.locations.show');
                    Route::get('{location}/edit', 'BannerLocationController@edit')->name('admin.banners.locations.edit');
                    Route::put('{location}', 'BannerLocationController@update')->name('admin.banners.locations.update');
                    Route::delete('{location}', 'BannerLocationController@destroy')->name('admin.banners.locations.destroy');
                });

                Route::get('', 'BannerController@index')->name('admin.banners.index');
                Route::get('create', 'BannerController@create')->name('admin.banners.create');
                Route::post('', 'BannerController@store')->name('admin.banners.store');
                Route::get('{banner}', 'BannerController@show')->name('admin.banners.show');
                Route::get('{banner}/edit', 'BannerController@edit')->name('admin.banners.edit');
                Route::put('{banner}', 'BannerController@update')->name('admin.banners.update');
                Route::delete('{banner}', 'BannerController@destroy')->name('admin.banners.destroy');
            });

        });
    });
});
