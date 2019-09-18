<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use App\Content;
use App\Banner;
use App\TermTaxonomy;
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
        view()->composer('pages.*', function ($view) {
            $content = Content::where('slug', \Request::path())->first();
            return $view->with('content', $content);
        });

        Blade::directive('contents', function ($expression) {
            //dd($expression);
            $someObject = json_decode($expression);
            $contents = Content::whereRaw('1 = 1');
//            dd($someObject);
            $metaInputs=[];
            foreach ($someObject->metasFilter as $item) {
                $metaInputs[$item->key] = $item->value;
            }
//            dd($metaInputs);
            foreach ($someObject->filter as $some) {
                    $contents = $contents->where($some->field, '=', $some->key);
            }
            $contents = $contents->whereHas('metas', function ($query) use ($metaInputs) {
                foreach ($metaInputs as $key => $value) {
                    $query->where('key', $key);
                    $query->where('value', $value);
                }
            });
            $contents = $contents->take($someObject->limit);
            $contents = $contents->get();
            foreach ($contents as $content){
                $content->metas = $content->metas()->get();
            }
            $carData=null;
            $carData=json_encode($contents);
            //$carData = htmlspecialchars(json_encode($contents), ENT_QUOTES, 'UTF-8');
            //dd($carData);
            $daaataaa=$someObject->returnVariable;
            if (!starts_with($daaataaa, '$')) {
                $daaataaa = '$' . $daaataaa;
            }

            return "<?php {$daaataaa} = ('$carData'); ?>";
        });


        Blade::directive('banners', function ($expression) {
            $someObject = json_decode($expression);
            $banners = Banner::select('id', 'banner', 'link', 'location_id', 'status')->whereRaw('1 = 1')->orderBy('id', 'asc');
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

        Blade::directive('getTaxonomys', function ($expression) {
            $someObject = json_decode($expression);
            $taxonomys = TermTaxonomy::select('id', 'taxonomy', 'description')->whereRaw('1 = 1')->orderBy('description', 'asc');
            foreach ($someObject as $some) {
                $taxonomys = $taxonomys->where($some->field, '=', $some->key);
                $daaataaa= $some->key;
            }
            $taxonomys = $taxonomys->get();
            $taxonomyData=json_encode($taxonomys);
//            /dd($daaataaa);
            //$daaataaa='taxonomys';
            if (!starts_with($daaataaa, '$')) {
                $daaataaa = '$' . $daaataaa;
            }
            return "<?php {$daaataaa} = ('$taxonomyData'); ?>";
        });

    }
}
