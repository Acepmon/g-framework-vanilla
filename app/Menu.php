<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function parent()
    {
        return $this->hasOne('App\Menu', 'id', 'parent_id');
    }
}
