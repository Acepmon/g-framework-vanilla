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
use App\Entities\ContentManager;
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

        Blade::directive('content', function ($expression) {
            // Parsing of passed expression
            $parsed = $this->parseExpression($expression);
            $variable = $parsed->variable;
            $returnArg = "";

            // End uneheer zavaan uildel hiigdej bgaa!!!
            // Anhaaraltai yum oorchilno uu.
            // Er ni yum oorchlood heregguidee. Amarhan evderne!
            $contents = "\App\Content";
            foreach ($parsed->filters as $index => $filter) {
                $inputExcept = ['title', 'slug', 'content', 'type', 'status', 'visibility', 'limit', 'page', 'author_id', '_token'];
                $inputExcept2 = ['title', 'slug', 'content', 'type', 'author_id', '_token'];
                $pointer = $index == 0 ? '::' : '->';

                if (in_array($filter['field'], $inputExcept)) {
                    if (in_array($filter['field'], $inputExcept2)) {
                        $contents = $contents . $pointer . $this->where($filter['field'], $filter['operator'], $filter['value']);
                    } else if ($filter['field'] == 'limit') {
                        $returnArg = $filter['value'];
                    }
                } else {
                    $contents = $contents . $pointer . $this->whereHas('metas', [
                        'key' => $filter['field'],
                        'value' => [$filter['operator'] => $filter['value']]
                    ]);
                }
            }

            // Static filter
            $contents = $contents . $pointer . $this->where('status', Content::STATUS_PUBLISHED);
            $contents = $contents . $pointer . $this->where('visibility', Content::VISIBILITY_PUBLIC);

            // Collection return type
            $contents = $contents . "->" . $parsed->return . "(" . $returnArg . ")";

            return "<?php foreach($contents as $variable) { ?>";
        });

        Blade::directive('endcontent', function () {
            return "<?php } ?>";
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

    private function parseExpression($expression) {
        if (\Str::contains($expression, '|')) {
            $expressionReturn = explode("|", $expression);
            $filters = trim(explode("as", trim($expressionReturn[0]))[0]);
            $variable = trim(explode("as", trim($expressionReturn[0]))[1]);
            $return = trim($expressionReturn[1]);
        } else {
            $filters = trim(explode("as", $expression)[0]);
            $variable = trim(explode("as", $expression)[1]);
            $return = 'get';
        }

        $filters = explode(",", $filters);
        $filters = array_map(function ($filter) {
            return $this->parseFilter(trim($filter));
        }, $filters);

        $parsed = new \stdclass;
        $parsed->filters = $filters;
        $parsed->variable = $variable;
        $parsed->return = $return;

        return $parsed;
    }

    private function parseFilter($filter) {
        $operators = ['=', '!=', '>', '>=', '<', '<='];
        foreach ($operators as $operator) {
            if (\Str::contains($filter, $operator)) {
                $split = explode($operator, $filter);
                return [
                    'field' => trim($split[0]),
                    'operator' => trim($operator),
                    'value' => trim($split[1])
                ];
            }
        }
    }

    private function where($field, $operator, $value = null) {
        if (isset($value)) {
            return "where('" . $field . "', '" . $operator . "', " . $this->whereValueStr($value) . ")";
        }
        return "where('" . $field . "', " . $this->whereValueStr($operator) . ")";
    }

    private function whereValueStr($value) {
        $ignores = ['request(', 'Auth::user()', 'intval('];
        foreach ($ignores as $key => $ignore) {
            if (\Str::startsWith($value, $ignore)) {
                return $value;
            }
        }
        return "'" . $value . "'";
    }

    private function whereHas($table, $queries = array()) {
        $part1 = "whereHas('" . $table . "', function ($"."query) {";
        $part2 = "";
        foreach ($queries as $field => $value) {
            if (is_array($value)) {
                foreach ($value as $operator => $val) {
                    $part2 = $part2 . "$" . "query->" . $this->where($field, $operator, $val) . ";";
                }
            } else {
                $part2 = $part2 . "$" . "query->" . $this->where($field, $value) . ";";
            }
        }
        $part3 = "})";
        return $part1 . $part2 . $part3;
    }

    private function limit($limit = 15) {
        return "limit(" . intval($limit) . ")";
    }

    private function page($page = 1) {
        return "page(" . intval($page) . ")";
    }
}
