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
use Modules\Content\Transformers\TaxonomyCollection;
use Illuminate\Support\Carbon;

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
        view()->composer(config('content.pages.viewPath') . '.*', function ($view) {
            $content = Content::where('slug', \Request::path())->first();
            $banners = Banner::all();
            return $view->with('content', $content)->with('banners', $banners);
        });

        Blade::directive('contents', function ($expression) {
            //dd($expression);
            $someObject = json_decode($expression);
            $contents = Content::whereRaw('1 = 1');
//            dd($someObject);
            $metaInputs=[];
            if(array_key_exists("metasFilter",$someObject)){
                foreach ($someObject->metasFilter as $item) {
                    $metaInputs[$item->key] = $item->value;
                }
            }
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
                $content->author = $content->author;
                $content->metas = $content->metas()->get();
            }
            $carData=null;
            $carData=$contents->toJson();
            //$carData = htmlspecialchars(json_encode($contents), ENT_QUOTES, 'UTF-8');
            //dd($carData);
            $daaataaa=$someObject->returnVariable;
            if (!starts_with($daaataaa, '$')) {
                $daaataaa = '$' . $daaataaa;
            }

            return "<?php {$daaataaa} = json_decode('$carData'); ?>";
        });


        Blade::directive('banners', function ($expression) {
            $someObject = json_decode($expression);
            $banners = Banner::select('id', 'banner', 'link', 'location_id', 'status')->whereRaw('1 = 1')->orderBy('id', 'asc');
            $banners = $banners->where('status', '=', 'active');
            $banners = $banners->whereDate('starts_at', '<', Carbon::now()->toDateTimeString());
            $banners = $banners->whereDate('ends_at', '>', Carbon::now()->toDateTimeString());
            foreach ($someObject as $some) {
                $banners = $banners->where($some->field, '=', $some->key);
            }
            $banners = $banners->get();
            $bannerData=$banners->toJson();
            $daaataaa='banners';
            if (!starts_with($daaataaa, '$')) {
                $daaataaa = '$' . $daaataaa;
            }
            return "<?php {$daaataaa} = json_decode('$bannerData'); ?>";
        });

        Blade::directive('getTaxonomys', function ($expression) {
            $someObject = json_decode($expression);
            $taxonomys = TermTaxonomy::whereRaw('1 = 1')->orderBy('description', 'asc');
            foreach ($someObject->filter as $some) {
                $taxonomys = $taxonomys->where($some->field, '=', $some->key);
                $daaataaa= $some->key;
            }
            $taxonomys = $taxonomys->get();
            $taxonomys = new TaxonomyCollection($taxonomys);
            $taxonomys = $taxonomys->toJson();
            $daaataaa = $someObject->returnValue;
            if (!starts_with($daaataaa, '$')) {
                $daaataaa = '$' . $daaataaa;
            }

            return "<?php {$daaataaa} = json_decode('$taxonomys');?>";
        });

    }
}
