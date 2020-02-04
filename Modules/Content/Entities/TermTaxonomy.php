<?php

namespace Modules\Content\Entities;

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
        return $this->belongsTo('Modules\Content\Entities\Term', 'term_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('Modules\Content\Entities\Term', 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany('Modules\Content\Entities\TermTaxonomy', 'parent_id');
    }

    public function contents()
    {
        return $this->belongsToMany('Modules\Content\Entities\Content', 'term_relationship', 'term_taxonomy_id', 'content_id');
    }
}
