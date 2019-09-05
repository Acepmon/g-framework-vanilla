<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use App\Content;
use App\ContentMeta;
use DB;

class AppServiceProvider extends ServiceProvider
{
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

        Blade::directive('contents', function ($expression) {
            $someObject = json_decode($expression);
            $contents = Content::whereRaw('1 = 1');
            foreach ($someObject as $some) {
                $contents = $contents->where($some->field, '=', $some->key);
            }
            $contents = $contents->get();
            foreach ($contents as $content){
                $content->metas = $content->metas()->get();
            }
            return $contents;
        });

//        Blade::directive('content', function ($expression) {
/*            return "<?php echo ($expression)->format('m/d/Y H:i'); ?>";*/
//        });
    }
}
