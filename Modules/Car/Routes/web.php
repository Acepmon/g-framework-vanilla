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

            Route::get('/user/interested_cars', 'InterestedCarController@interestedCars');
            Route::post('/user/interested_cars', 'InterestedCarController@createInterested');
            Route::delete('/user/interested_cars', 'InterestedCarController@removeInterested');
            Route::put('/user/interested_cars', 'InterestedCarController@toggleInterested');

        });
    });
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin/modules')->group(function () {
        Route::namespace('Admin')->group(function () {

            Route::resource('car/options', 'CarOptionController')->names([
                'index' => 'admin.modules.car.options.index',
                'create' => 'admin.modules.car.options.create',
                'store' => 'admin.modules.car.options.store',
                'show' => 'admin.modules.car.options.show',
                'edit' => 'admin.modules.car.options.edit',
                'update' => 'admin.modules.car.options.update',
                'destroy' => 'admin.modules.car.options.destroy'
            ]);
            Route::resource('car/verifications', 'CarVerificationController')->names([
                'index' => 'admin.modules.car.verifications.index',
                'create' => 'admin.modules.car.verifications.create',
                'store' => 'admin.modules.car.verifications.store',
                'show' => 'admin.modules.car.verifications.show',
                'edit' => 'admin.modules.car.verifications.edit',
                'update' => 'admin.modules.car.verifications.update',
                'destroy' => 'admin.modules.car.verifications.destroy'
            ]);
            Route::resource('car/free', 'CarFreeController')->names([
                'index' => 'admin.modules.car.free.index',
                'create' => 'admin.modules.car.free.create',
                'store' => 'admin.modules.car.free.store',
                'show' => 'admin.modules.car.free.show',
                'edit' => 'admin.modules.car.free.edit',
                'update' => 'admin.modules.car.free.update',
                'destroy' => 'admin.modules.car.free.destroy'
            ]);
            Route::resource('car/premium', 'CarPremiumController')->names([
                'index' => 'admin.modules.car.premium.index',
                'create' => 'admin.modules.car.premium.create',
                'store' => 'admin.modules.car.premium.store',
                'show' => 'admin.modules.car.premium.show',
                'edit' => 'admin.modules.car.premium.edit',
                'update' => 'admin.modules.car.premium.update',
                'destroy' => 'admin.modules.car.premium.destroy'
            ]);
            Route::resource('car/best_premium', 'CarBestPremiumController')->names([
                'index' => 'admin.modules.car.best_premium.index',
                'create' => 'admin.modules.car.best_premium.create',
                'store' => 'admin.modules.car.best_premium.store',
                'show' => 'admin.modules.car.best_premium.show',
                'edit' => 'admin.modules.car.best_premium.edit',
                'update' => 'admin.modules.car.best_premium.update',
                'destroy' => 'admin.modules.car.best_premium.destroy'
            ]);
            Route::resource('car', 'CarController')->names([
                'index' => 'admin.modules.car.index',
                'create' => 'admin.modules.car.create',
                'store' => 'admin.modules.car.store',
                'show' => 'admin.modules.car.show',
                'edit' => 'admin.modules.car.edit',
                'update' => 'admin.modules.car.update',
                'destroy' => 'admin.modules.car.destroy'
            ]);

        });
    });
});
