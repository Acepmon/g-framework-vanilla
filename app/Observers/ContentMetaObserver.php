<?php

namespace App\Observers;

use App\Content;
use App\ContentMeta;
use App\Term;
use App\TermTaxonomy;
use App\Entities\TaxonomyManager;

class ContentMetaObserver
{
    const DATE_METAS = ['startsAt', 'endsAt'];

    public function created(ContentMeta $contentMeta)
    {
        $contentMeta->value = $this->validate($contentMeta->key, $contentMeta->value);
        $content = $contentMeta->content;
        if ($content->status == Content::STATUS_PUBLISHED && $content->visibility == Content::VISIBILITY_PUBLIC) {
            $this->incrementCount($contentMeta->key, $contentMeta->value);
        }

        if ($contentMeta->key == 'startsAt') {
            $duration = $contentMeta->content->metaValue('publishDuration');
            if ($duration) {
                $contentMeta->content->updateMeta('endsAt', $this->validate('endsAt', $contentMeta->value . ' +' . $duration . ' days'));
            }
        }
    }

    public function updating(ContentMeta $contentMeta)
    {
        $contentMeta->value = $this->validate($contentMeta->key, $contentMeta->value);
        $content = $contentMeta->content;
        if ($content->status == Content::STATUS_PUBLISHED && $content->visibility == Content::VISIBILITY_PUBLIC) {
            $this->incrementCount($contentMeta->key, $contentMeta->value);
            $this->decrementCount($contentMeta->key, $contentMeta->getOriginal($contentMeta->key));
        }

        if ($contentMeta->key == 'startsAt') {
            $duration = $contentMeta->content->metaValue('publishDuration');
            if ($duration) {
                $contentMeta->content->updateMeta('endsAt', $this->validate('endsAt', $contentMeta->value . ' +' . $duration . ' days'));
            }
        }
    }

    public function deleting(ContentMeta $contentMeta)
    {
        $content = $contentMeta->content;
        if ($content->status == Content::STATUS_PUBLISHED && $content->visibility == Content::VISIBILITY_PUBLIC) {
            $this->decrementCount($contentMeta->key, $contentMeta->value);
        }
    }

    public function incrementCount($key, $value) {
        $term = Term::where('name', $value)->first();
        if ($term && $term->group && $key == $term->group->metaValue('metaKey')) {
            $taxonomy = TermTaxonomy::where('term', $term)->first();
            if ($taxonomy) {
                $taxonomy->increment('count');
            }
        }
        // $term = Term::where('name', 'LIKE', '%'.$value.'%')->whereHas('metas', function($query) use($key) {
        //     $query->where('key', 'metaKey');
        //     $query->where('value', 'LIKE', '%'.$key.'%');
        // })->first();
        // // $term = TermTaxonomy::where('taxonomy', 'LIKE', '%'.$key.'%')->whereHas('term', function($query) use($value) {
        // //     return $query->where('name', 'LIKE', '%'.$value.'%');
        // // })->first();
        // if ($term) {
        //     $term->increment('count');
        // }
    }

    public function decrementCount($key, $value) {
        $term = TaxonomyManager::findTerm($value)->first();
        if ($term && $term->group && $key == $term->group->metaValue('metaKey')) {
            $taxonomy = TermTaxonomy::where('term_id', $term->id)->first();
            if ($taxonomy) {
                $term->decrement('count');
            }
        }
        // $term = TermTaxonomy::where('taxonomy', 'LIKE', '%'.$key.'%')->whereHas('term', function($query) use($value) {
        //     $query->where('key', 'metaKey');
        //     $query->where('value', 'LIKE', '%'.$value.'%');
        // })->first();
        // if ($term) {
        //     $term->decrement('count');
        // }
    }

    public function validate($key, $value) {
        if (in_array($key, self::DATE_METAS)) {
            $value = date('Y-m-d H:i:s', strtotime($value));
        }
        return $value;
    }
}