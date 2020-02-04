<?php

namespace App\Providers;

use DB;
use Log;
use App\Resolvers\SocialUserResolver;
use Coderello\SocialGrant\Resolvers\SocialUserResolverInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Modules\Content\Entities\Content;
use Modules\Content\Entities\ContentMeta;
use App\UserMeta;
use App\Observers\ContentObserver;
use App\Observers\ContentMetaObserver;
use App\Observers\UserMetaObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        SocialUserResolverInterface::class => SocialUserResolver::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Content::observe(ContentObserver::class);
        ContentMeta::observe(ContentMetaObserver::class);
        UserMeta::observe(UserMetaObserver::class);

        Blade::extend(function($value) {
            return preg_replace('/\{\?(.+)\?\}/', '<?php ${1} ?>', $value);
        });

        DB::listen(function($query) {
            Log::info(
                $query->sql,
                $query->bindings,
                $query->time
            );
        });


    }
}
