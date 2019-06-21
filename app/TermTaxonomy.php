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
}
