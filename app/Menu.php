<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function parent()
    {
        return $this->hasOne('App\Menu', 'id', 'parent_id');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group', 'group_menu');
    }
}
