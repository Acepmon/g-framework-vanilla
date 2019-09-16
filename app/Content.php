<?php

namespace App;

use App\ContentMeta;
use App\TermTaxonomy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Content extends Model
{
    const TYPE_PAGE = 'page';
    const TYPE_POST = 'post';
    const TYPE_CAR = 'car';

    const TYPE_ARRAY = [
        self::TYPE_PAGE,
        self::TYPE_POST,
        self::TYPE_CAR
    ];

    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISHED = 'published';
    const STATUS_PENDING = 'pending';

    const STATUS_ARRAY = [
        self::STATUS_DRAFT,
        self::STATUS_PUBLISHED,
        self::STATUS_PENDING
    ];

    const VISIBILITY_PUBLIC = 'public';
    const VISIBILITY_PRIVATE = 'private';
    const VISIBILITY_AUTH = 'authenticate';

    const VISIBILITY_ARRAY = [
        self::VISIBILITY_PUBLIC,
        self::VISIBILITY_PRIVATE,
        self::VISIBILITY_AUTH
    ];

    const NAMING_CONVENTION = '_';

    public function metas()
    {
        return $this->hasMany('App\ContentMeta', 'content_id');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function terms()
    {
        return $this->belongsToMany('App\TermTaxonomy', 'term_relationships');
    }

    public function author()
    {
        return $this->hasOne('App\User', 'id', 'author_id');
    }

    public function medias()
    {
        $medias = $this->metas->where('key', 'medias');
        $media_path = array();
        foreach($medias as &$media) {
            $imagepath = $media->value;
            array_push($media_path, Config::getStorage() . $imagepath);
            // if (!Storage::disk('local')->exists($imagepath)) {
            //     $image = Storage::disk('ftp')->get($imagepath);
            //     Storage::disk('local')->put($imagepath, $image);
            // }
            // array_push($media_path, Storage::disk('local')->url($imagepath));
        }
        return $media_path;
    }

    public function currentView()
    {
        $time = $this->metas->whereIn('key', ['initial', 'revision', 'revert'])->sortByDesc('id')->first()->value;
        $time = json_decode($time)->datetime;
        $name = ($this->slug == '/' || $this->slug == '') ? 'root' : $this->slug;
        return $name . self::NAMING_CONVENTION . $this->status . self::NAMING_CONVENTION . $time;
    }

    public function attachMeta($key, $value)
    {
        if ($key && $value && $this->id) {
            $content_meta = new ContentMeta();
            $content_meta->content_id = $this->id;
            $content_meta->key = $key;
            $content_meta->value = $value;
            $content_meta->save();
        }
    }

    public function updateMeta($key, $value)
    {
        if ($key && $value && $this->id) {
            if (is_array($value)) {
                $exists = $this->metas->where('key', $key);
                foreach($exists as $exist) {
                    if (in_array($exist->value, $value)) {
                        $value = array_diff($value, [$exist->value]);
                    } else {
                        $exist->delete();
                    }
                }
                foreach($value as $v) {
                    $this->attachMeta($key, $v);
                }
            } else {
                $exists = $this->metas->where('key', $key)->first();
                if ($exists) {
                    $exists->value = $value;
                    $exists->save();
                } else {
                    $this->attachMeta($key, $value);
                }
            }
        }
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
    public function metaArray($key) {
        try {
            $meta = $this->metas->where('key', $key);
            if ($meta) {
                return $meta->transform(function ($item) {
                    return $item->value;
                });
            }
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

    public function visibilityClass() {
        switch ($this->visibility) {
            case self::VISIBILITY_PUBLIC: return 'success';
            case self::VISIBILITY_PRIVATE: return 'secondary';
            case self::VISIBILITY_AUTH: return 'primary';
            default: return 'default';
        }
    }
}
