<?php

namespace Modules\System\Entities;

use Illuminate\Database\Eloquent\Model;
use Kodeine\Metable\Metable;

class Menu extends Model
{
    use Metable;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $metaTable = 'menus_meta';

    public function parent()
    {
        return $this->hasOne('Modules\System\Entities\Menu', 'id', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('Modules\System\Entities\Menu', 'parent_id', 'id');
    }

    public function groups()
    {
        return $this->belongsToMany('Modules\System\Entities\Group', 'group_menu');
    }
}
