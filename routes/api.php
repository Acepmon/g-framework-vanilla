<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

// Private API
Route::prefix('v1')->group(function () {
    Route::namespace('API\v1')->group(function () {
        Route::middleware('auth:api')->group(function () {

            Route::get('/user', 'UserController@user');
            Route::get('/user/interested_cars', 'UserController@interestedCars');

        });
    });
});

// Public API
Route::prefix('v1')->group(function () {
    Route::namespace('API\v1')->group(function () {
        Route::apiResources([
            'banner_locations' => 'BannerLocationController',
            'banners' => 'BannerController',
            'contents' => 'ContentController'
        ]);
    });
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', 'UserController@details');
});
