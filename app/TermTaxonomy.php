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
        return $this->belongsTo('App\Term');
    }

    public function parent()
    {
        return $this->hasOne('App\Term');
    }

    public function contents()
    {
        return $this->
    }
}
