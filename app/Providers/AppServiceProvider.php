<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use App\Content;
use App\ContentMeta;
use App\Observers\ContentMetaObserver;
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
        ContentMeta::observe(ContentMetaObserver::class);
        Schema::defaultStringLength(191);
        \Blade::directive('contents', function ($expression) {
            $someObject = json_decode($expression);
            $contents = Content::whereRaw('1 = 1');
            $car=null;
            foreach ($someObject as $some) {
                $contents = $contents->where($some->field, '=', $some->key);
            }
            $contents = $contents->get();
            foreach ($contents as $content){
                $content->metas = $content->metas()->get();
            }
            //dd(with($contents));
            $data=1;
            return view('car-web_published_1567573753.blade',['contents' => $contents]);
/*            return preg_replace('/\{\?(.+)\?\}/', '<?php ${1} ?>', $contents);*/
//            return
//                <div class="card">
//                            <div class="brand-name"></div>
//                            <div class="card-img">
//
//                                <img src="{{asset(\'car-web/img/Cars/1.jpg\')}}" class="img-fluid" alt="alt">
//                                <div class="info">
//                                  <span class="carIcon-engine">
//                                    <p>1499 L</p>
//                                  </span>
//                                                    <span class="carIcon-car-6">
//                                    <p>52,000 KM</p>
//                                  </span>
//                                                    <span class="carIcon-gas-station">
//                                    <p>Gasoline</p>
//                                  </span>
//                                                    <span class="carIcon-gearshift">
//                                    <p>Automatic</p>
//                                  </span>
//                                                    <span class="carIcon-steering-wheel">
//                                    <p>Right wheel</p>
//                                  </span>
//                                                    <span class="color" data-color="white">
//                                    <p>White</p>
//                                  </span>
//                                </div>
//                                <div class="card-caption">
//                                    <div class="meta">2006/2013 | 17,820km | Gasoline <i class="show-more fab fa fa-angle-up"></i></div>
//                                    <div class="favorite">
//                                        <i class="icon-heart"></i>
//                                    </div>
//                                </div>
//                            </div>
//
//                            <div class="card-body shadow">
//                                <div class="card-description">
//                                    <a href="detail-page.html" class="card-title">Santa fe The Prime diesel 2.0 2wd</a>
//                                    <div class="card-meta">
//                                        <div class="status">Change / Finance</div>
//                                        <div class="price">12 Сая ₮</div>
//                                    </div>
//                                </div>
//                            </div>
//                        </div>
//                        ';
        });

//        Blade::directive('content', function ($expression) {
/*            return "<?php echo ($expression)->format('m/d/Y H:i'); ?>";*/
//        });
    }
}
