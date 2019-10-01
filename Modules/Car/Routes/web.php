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

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin/modules')->group(function () {
        Route::namespace('Admin')->group(function () {

            Route::resource('cars/options', 'CarOptionController')->names([
                'index' => 'admin.cars.options.index',
                'create' => 'admin.cars.options.create',
                'store' => 'admin.cars.options.store',
                'show' => 'admin.cars.options.show',
                'edit' => 'admin.cars.options.edit',
                'update' => 'admin.cars.options.update',
                'destroy' => 'admin.cars.options.destroy'
            ]);
            Route::resource('cars/verifications', 'CarVerificationController')->names([
                'index' => 'admin.cars.verifications.index',
                'create' => 'admin.cars.verifications.create',
                'store' => 'admin.cars.verifications.store',
                'show' => 'admin.cars.verifications.show',
                'edit' => 'admin.cars.verifications.edit',
                'update' => 'admin.cars.verifications.update',
                'destroy' => 'admin.cars.verifications.destroy'
            ]);
            Route::resource('cars/free', 'CarFreeController')->names([
                'index' => 'admin.cars.free.index',
                'create' => 'admin.cars.free.create',
                'store' => 'admin.cars.free.store',
                'show' => 'admin.cars.free.show',
                'edit' => 'admin.cars.free.edit',
                'update' => 'admin.cars.free.update',
                'destroy' => 'admin.cars.free.destroy'
            ]);
            Route::resource('cars/premium', 'CarPremiumController')->names([
                'index' => 'admin.cars.premium.index',
                'create' => 'admin.cars.premium.create',
                'store' => 'admin.cars.premium.store',
                'show' => 'admin.cars.premium.show',
                'edit' => 'admin.cars.premium.edit',
                'update' => 'admin.cars.premium.update',
                'destroy' => 'admin.cars.premium.destroy'
            ]);
            Route::resource('cars/best_premium', 'CarBestPremiumController')->names([
                'index' => 'admin.cars.best_premium.index',
                'create' => 'admin.cars.best_premium.create',
                'store' => 'admin.cars.best_premium.store',
                'show' => 'admin.cars.best_premium.show',
                'edit' => 'admin.cars.best_premium.edit',
                'update' => 'admin.cars.best_premium.update',
                'destroy' => 'admin.cars.best_premium.destroy'
            ]);
            Route::resource('cars', 'CarController')->names([
                'index' => 'admin.cars.index',
                'create' => 'admin.cars.create',
                'store' => 'admin.cars.store',
                'show' => 'admin.cars.show',
                'edit' => 'admin.cars.edit',
                'update' => 'admin.cars.update',
                'destroy' => 'admin.cars.destroy'
            ]);

        });
    });
});
