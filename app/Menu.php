<?php

namespace App;

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
        return $this->hasOne('App\Menu', 'id', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Menu', 'parent_id', 'id');
    }

    public function groups()
    {
        return $this->belongsToMany('Modules\System\Entities\Group', 'group_menu');
    }
}
