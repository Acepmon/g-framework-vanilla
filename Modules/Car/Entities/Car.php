<?php

namespace Modules\Car\Entities;

use App\Content;

class Car extends Content
{
    protected $fillable = [];

    public static function all($columns = []) {
        return Content::where('type', Content::TYPE_CAR)->where('status', Content::STATUS_PUBLISHED)->where('visibility', Content::VISIBILITY_PUBLIC);
    }

    public static function order($orderBy, $order, $contents = Null) {
        if ($contents == Null) {
            $contents = self::all();
        }

        if ($orderBy == 'priceAmount') {
            $order = 'asc';
        }

        if ($orderBy != 'updated_at') {
            $contents = $contents->join('content_metas', 'contents.id', '=', 'content_metas.content_id')
                ->where('content_metas.key', '=', $orderBy)->select('contents.*')->addSelect('content_metas.value');
            $contents = $contents->orderBy('value', $order);
        } else {
            $contents = $contents->orderBy($orderBy, $order);
        }
        return $contents;
    }

    public static function filter($contents, $filter = Null) {
        if ($contents == Null) {
            $contents = self::all()->orderBy('updated_at', 'desc');
        }

        foreach ($filter as $key => $value) {
            if ($value != Null) {
                $contents = metaHas($contents, $key, $value);
            }
        }
        $contents = metaHas($contents, 'priceAmount', $value, 'range', $filter['minPrice'], $filter['maxPrice']);

        return $contents;
    }

    public static function filterByPremium($limit = Null, $contents = Null) {
        $now = now();
        $filtered = $contents;
        if ($filtered == Null) {
            $filtered = self::all()->orderBy('updated_at', 'desc');
        }
        $filtered = metaHas($filtered, 'publishVerified', True);
        $filtered = $filtered->whereHas('metas', function ($query) use ($now) {
            $query->where([['key', 'publishVerifiedEnd'],['value','>=',$now]]);
        });

        // >>>>>>>>>>>> USE THIS
        // $premium = metaHas(clone $filtered, 'publishType', 'premium')->get();
        // $best_premium = metaHas(clone $filtered, 'publishType', 'best_premium')->get();
        // $filtered = $best_premium->push($premium);
        // <<<<<<<<<<<< OR THIS
        $filtered = $filtered->whereHas('metas', function ($query) {
            $query->where('key', 'publishType');
            $query->where('value', 'best_premium')->orWhere('value', 'premium');
        });

        if ($limit) {
            $filtered = $filtered->paginate($limit);
        }
        // dd($filtered->get());
        return $filtered;
    }

    /*
    * Converts GET request paramaters to content_meta object array
    * Used in car lists
    */
    public static function manageRequest() {
        $request = [];
        $request['type'] = request('car-type', Null);
        $request['markName'] = request('car-manufacturer', Null);
        $request['colorName'] = request('car-colors', Null);
        $request['fuelType'] = request('car-fuel', Null);
        $request['transmission'] = request('car-transmission', Null);
        $request['advantages'] = request('car-advantage', Null);
        $request['manCount'] = request('car-mancount', Null);
        $request['wheelPosition'] = request('car-wheel-pos', Null);
        $request['countryName'] = request('provinces', Null);
        $request['buildYear'] = request('year', Null);
        $request['distanceDriven'] = request('distance_driven', Null);
        $request['doctorVerified'] = request('doctors_verified', Null);
        $request['minPrice'] = intVal(request('min_price', Null)) * 1000;
        $request['maxPrice'] = intVal(request('max_price', Null)) * 1000;

        // $request = json_encode($request);
        return $request;
    }
}
