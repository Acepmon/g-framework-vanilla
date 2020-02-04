<?php

namespace App;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class TermTaxonomy extends Model
{
    use Cachable;
    //
    public $timestamps = false;
    protected $table = 'term_taxonomy';

    public function term()
    {
        return $this->belongsTo('App\Term', 'term_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Term', 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany('App\TermTaxonomy', 'parent_id');
    }

    public function contents()
    {
        return $this->belongsToMany('Modules\Content\Entities\Content', 'term_relationship', 'term_taxonomy_id', 'content_id');
    }
}
