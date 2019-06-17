<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function content_metas()
    {
        return $this->hasMany('App\Content_metas', 'content_id');
    }
}
