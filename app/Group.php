<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    public $timestamps = false;

    public function menus()
    {
        return $this->belongsToMany('App\Menu', 'group_menu');
    }
}
