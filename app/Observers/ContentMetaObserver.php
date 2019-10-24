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
            TaxonomyManager::incrementCount($contentMeta->key, $contentMeta->value);
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
            TaxonomyManager::decrementCount($contentMeta->key, $contentMeta->getOriginal('value'));
            TaxonomyManager::incrementCount($contentMeta->key, $contentMeta->value);
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
            TaxonomyManager::decrementCount($contentMeta->key, $contentMeta->value);
        }
    }

    public function validate($key, $value) {
        if (in_array($key, self::DATE_METAS)) {
            $value = date('Y-m-d H:i:s', strtotime($value));
        }
        return $value;
    }
}
