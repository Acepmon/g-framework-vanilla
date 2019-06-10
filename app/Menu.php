<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    const TYPE_MENU = 'menu';
    const TYPE_LINK = 'link';
    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISH = 'published';
    const VISIBILITY_PUBLIC = 'public';
    const VISIBILITY_PRIVATE = 'private';

    public function parent()
    {
        return $this->hasOne('App\Menu', 'id', 'parent_id');
    }
}
