<?php

use Illuminate\Http\Request;

use Modules\System\Transformers\User as UserResource;
use Modules\System\Transformers\UserNotificationCollection;
use Modules\System\Transformers\UserGroupCollection;
use Modules\System\Transformers\UserMenuCollection;
use Modules\System\Transformers\UserCommentCollection;
use Modules\System\Transformers\UserContentCollection;

use App\Entities\ContentManager;

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
                return new UserNotificationCollection(Auth::user()->notifications);
            });

            Route::get('/user/notifications/unread', function () {
                return new UserNotificationCollection(Auth::user()->unreadNotifications);
            });

            Route::get('/user/groups', function () {
                return new UserGroupCollection(Auth::user()->groups);
            });

            Route::get('/user/menus', function () {
                return new UserMenuCollection(Auth::user()->menus);
            });

            Route::get('/user/comments', function () {
                return new UserCommentCollection(Auth::user()->comments);
            });

            Route::get('/user/contents', function () {
                $authUser = Auth::user();
                $contents = ContentManager::serializeRequest(request());

                $contents->getCollection()->transform(function ($content) use ($authUser) {
                    if (isset($authUser)) {
                        $interested = $authUser->metas()->where('key', 'interestedCars')->where('value', $content->id)->count();
                        return ContentManager::contentToArray($content, [
                            "authInterested" => $interested ? true : false,
                        ]);
                    } else {
                        return ContentManager::contentToArray($content);
                    }
                });

                return response()->json($contents);
            });
        });
    });
});
