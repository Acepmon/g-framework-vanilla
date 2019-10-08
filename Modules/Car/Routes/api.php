<?php

use Illuminate\Http\Request;

use Modules\Car\Transformers\InterestedCars as InterestedCarsCollection;

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

Route::prefix('v1')->group(function () {
    Route::namespace('API\v1')->group(function () {
        Route::middleware('auth:api')->group(function () {

            Route::get('/user/interested_cars', 'InterestedCarController@interestedCars');

        });
    });
});
