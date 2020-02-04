<?php

namespace Modules\Content\Entities;

use Illuminate\Database\Eloquent\Model;

class TermMeta extends Model
{
    //
    protected $table = 'term_metas';

    public $timestamps = false;

    public function term()
    {
        return $this->belongsTo('Modules\Content\Entities\Term', 'term_id');
    }
}
