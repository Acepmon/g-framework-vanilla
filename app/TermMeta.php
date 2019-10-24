<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermMeta extends Model
{
    //
    protected $table = 'term_metas';

    public $timestamps = false;

    public function term()
    {
        return $this->belongsTo('App\Term', 'term_id');
    }
}
