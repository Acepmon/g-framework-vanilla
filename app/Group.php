<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    const TYPE_SYSTEM = 'system'; // System user groups are in the system by default. They cannot be deleted, it is unchanging.
    const TYPE_STATIC = 'static'; // Static user groups are those which are populated manually, that is by the administrator.
    const TYPE_DYNAMIC = 'dynamic'; // Dynamic user groups are populated and maintained through either a query or a directory server.

    const TYPE_ARRAY = [
        self::TYPE_SYSTEM,
        self::TYPE_STATIC,
        self::TYPE_DYNAMIC
    ];

    public $timestamps = false;

    public function menus()
    {
        return $this->belongsToMany('App\Menu', 'group_menu');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_group');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'group_permission')->withPivot('is_granted');
    }

    public function parent()
    {
        return $this->hasOne('App\Group', 'id', 'parent_id');
    }

    public function typeClass()
    {
        switch ($this->type) {
            case self::TYPE_SYSTEM: return 'primary';
            case self::TYPE_STATIC: return 'info';
            case self::TYPE_DYNAMIC: return 'warning';
            default: return 'default';
        }
    }
}

