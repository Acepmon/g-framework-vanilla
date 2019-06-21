<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    //
    public $timestamps = false;

    public function metas()
    {
        return $this->hasMany('App\TermMeta', 'term_id');
    }
}
