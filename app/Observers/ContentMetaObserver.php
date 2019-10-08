<?php

namespace App\Observers;

use App\TermTaxonomy;
use App\ContentMeta;

class ContentMetaObserver
{
    const DATE_METAS = ['startsAt', 'endsAt'];

    public function created(ContentMeta $contentMeta)
    {
        $contentMeta->value = $this->validate($contentMeta->key, $contentMeta->value);
        $this->incrementCount($contentMeta->key, $contentMeta->value);

        if ($contentMeta->key == 'startsAt') {
            $duration = $contentMeta->content->metaValue('publishDuration');
            if ($duration) {
                $contentMeta->content->attachMeta('endsAt', $contentMeta->value . ' +' . $duration . ' days');
            }
        }
    }

    public function updating(ContentMeta $contentMeta)
    {
        $contentMeta->value = $this->validate($contentMeta->key, $contentMeta->value);
        $this->incrementCount($contentMeta->key, $contentMeta->value);
        $this->decrementCount($contentMeta->key, $contentMeta->getOriginal($contentMeta->key));

        if ($contentMeta->key == 'startsAt') {
            $duration = $contentMeta->content->metaValue('publishDuration');
            if ($duration) {
                $contentMeta->content->updateMeta('endsAt', $contentMeta->value . ' +' . $duration . ' days');
            }
        }
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

    public function validate($key, $value) {
        if (in_array($key, self::DATE_METAS)) {
            $value = date('Y-m-d H:i:s', strtotime($value));
        }
        return $value;
    }
}