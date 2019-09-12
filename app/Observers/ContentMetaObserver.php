<?php

namespace App\Observers;

use App\TermTaxonomy;
use App\ContentMeta;

class ContentMetaObserver
{

    public function created(ContentMeta $contentMeta)
    {
        $this->incrementCount($contentMeta->key, $contentMeta->value);
    }

    public function updating(ContentMeta $contentMeta)
    {
        $this->incrementCount($contentMeta->key, $contentMeta->value);
        $this->decrementCount($contentMeta->key, $contentMeta->getOriginal($contentMeta->key));
    }

    public function deleting(ContentMeta $contentMeta)
    {
        $this->decrementCount($contentMeta->key, $contentMeta->value);
    }

    public function incrementCount($key, $value) {
        $term = TermTaxonomy::where('taxonomy', 'LIKE', '%'.$key.'%')->whereHas('term', function($query) use($value) {
            return $query->where('name', 'LIKE', '%'.$value.'%');
        })->first();
        if ($term) {
            $term->increment('count');
        }
    }

    public function decrementCount($key, $value) {
        $term = TermTaxonomy::where('taxonomy', 'LIKE', '%'.$key.'%')->whereHas('term', function($query) use($value) {
            return $query->where('name', 'LIKE', '%'.$value.'%');
        })->first();
        if ($term) {
            $term->decrement('count');
        }
    }
}