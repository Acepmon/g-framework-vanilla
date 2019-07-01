<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    const TYPE_MENU = 'menu';
    const TYPE_LINK = 'link';

    const TYPE_ARRAY = [
        self::TYPE_MENU,
        self::TYPE_LINK
    ];

    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISH = 'published';

    const STATUS_ARRAY = [
        self::STATUS_DRAFT,
        self::STATUS_PUBLISH
    ];

    const VISIBILITY_PUBLIC = 'public';
    const VISIBILITY_PRIVATE = 'private';
    const VISIBILITY_AUTH = 'authenticate';

    const VISIBILITY_ARRAY = [
        self::VISIBILITY_PUBLIC,
        self::VISIBILITY_PRIVATE,
        self::VISIBILITY_AUTH
    ];

    public function parent()
    {
        return $this->hasOne('App\Menu', 'id', 'parent_id');
    }

    public function statusClass()
    {
        switch ($this->status) {
            case self::STATUS_DRAFT: return 'default';
            case self::STATUS_PUBLISH: return 'success';
            default: return 'default';
        }
    }

    public function visibilityIcon()
    {
        switch ($this->visibility) {
            case self::VISIBILITY_PUBLIC: return 'icon-eye';
            case self::VISIBILITY_PRIVATE: return 'icon-eye-blocked';
            case self::VISIBILITY_AUTH: return 'icon-lock4';
            default: return 'icon-eye';
        }
    }

    public function getType()
    {
        return self::STATUS_ARRAY;
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group', 'group_menu');
    }
}
