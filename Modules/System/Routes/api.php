<?php

use Illuminate\Http\Request;

use Modules\System\Transformers\User as UserResource;

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

// Private API
Route::prefix('v1')->group(function () {
    Route::namespace('API\v1')->group(function () {
        Route::middleware('auth:api')->group(function () {

            Route::get('/user', function () {
                return new UserResource(Auth::user());
            });
            
            Route::get('/user/notifications', function () {
                
            });

            Route::get('/user/groups', function () {

            });

            Route::get('/user/menus', function () {

            });

            Route::get('/user/comments', function () {

            });

            Route::get('/user/contents', function () {

            });
        });
    });
});
