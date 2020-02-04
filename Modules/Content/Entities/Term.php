<?php

namespace Modules\Content\Entities;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    //
    public $timestamps = false;

    public function metas()
    {
        return $this->hasMany('Modules\Content\Entities\TermMeta', 'term_id');
    }

    public function group()
    {
        return $this->belongsTo('Modules\Content\Entities\Term', 'group_id');
    }

    public function taxonomy()
    {
        return $this->hasOne('Modules\Content\Entities\TermTaxonomy', 'term_id');
    }

    public function metaValue($key) {
        try {
            $meta = $this->metas->where('key', $key)->first();
            if ($meta)
                return $meta->value;
        } catch (\Exception $ex) {
            return Null;
        }
        return Null;
    }

    public function metasTransform() {
        $arr = [];
        foreach ($this->metas->groupBy('key')->toArray() as $key => $metaValues) {
            if (count($metaValues) > 1) {
                $arr[$key] = array_map(function ($meta) {
                    return $this->isJson($meta['value']) ? json_decode($meta['value']) : $meta['value'];
                }, $metaValues);
            } else {
                $arr[$key] = $this->isJson($metaValues[0]['value']) ? json_decode($metaValues[0]['value']) : $metaValues[0]['value'];
            }
        }
        return $arr;
    }

    private function isJson($string) {
        return ((is_string($string) &&
                (is_object(json_decode($string)) ||
                is_array(json_decode($string))))) ? true : false;
    }
}
