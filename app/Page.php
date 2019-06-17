<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function page_metas()
    {
        return $this->hasMany('App\Page_metas', 'page_id');
    }
}
