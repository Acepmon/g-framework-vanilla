<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    const STATUS_PENDING = 'pending review';

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

    public function metas()
    {
        return $this->hasMany('App\ContentMeta', 'content_id');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
