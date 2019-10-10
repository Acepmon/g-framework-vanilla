<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermTaxonomy extends Model
{
    //
    public $timestamps = false;
    protected $table = 'term_taxonomy';

    public function term()
    {
        return $this->belongsTo('App\Term', 'term_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Term', 'term_id', 'id');
    }

    public function contents()
    {
        return $this->belongsToMany('App\Content', 'term_relationship', 'term_taxonomy_id', 'content_id');
    }
}
