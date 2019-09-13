<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use App\Content;
use App\Banner;
use App\ContentMeta;
use DB;

class GframeworkServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::directive('contents', function ($expression) {
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
            $carData=null;
            $carData=json_encode($contents);
            $daaataaa='carDataHot';
            if (!starts_with($daaataaa, '$')) {
                $daaataaa = '$' . $daaataaa;
            }
            return "<?php {$daaataaa} = ('$carData'); ?>";
        });


        Blade::directive('banners', function ($expression) {
            $someObject = json_decode($expression);
            $banners = Banner::select('id', 'btn_show', 'btn_text', 'btn_link', 'banner_img_web', 'order', 'active')->whereRaw('1 = 1')->orderBy('order', 'asc');
            foreach ($someObject as $some) {
                $banners = $banners->where($some->field, '=', $some->key);
            }
            $banners = $banners->get();
            $bannerData=json_encode($banners);
            $daaataaa='banners';
            if (!starts_with($daaataaa, '$')) {
                $daaataaa = '$' . $daaataaa;
            }
            return "<?php {$daaataaa} = ('$bannerData'); ?>";
        });

    }
}