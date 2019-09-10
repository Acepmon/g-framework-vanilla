<?php

namespace App;

use App\ContentMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Content extends Model
{
    const TYPE_PAGE = 'page';
    const TYPE_POST = 'post';

    const TYPE_ARRAY = [
        self::TYPE_PAGE,
        self::TYPE_POST
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

    public function carInfo() {
        if ($this->type != 'car') {
            return null;
        }
        return json_decode($this->metas[0]->value);
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

    public function metaValue($key) {
        $meta = $this->metas->where('key', $key)->first();
        if ($meta)
            return $meta->value;
        return Null;
    }
}
