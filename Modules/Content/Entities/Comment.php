<?php

namespace Modules\Content\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function children()
    {
        return $this->hasMany('Modules\Content\Entities\Comment', 'parent_id');
    }

    public function metas()
    {
        return $this->hasMany('Modules\Content\Entities\CommentMeta', 'comment_id');
    }

    public function commentable()
    {
        return $this->morphTo();
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
