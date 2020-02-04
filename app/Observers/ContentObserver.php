<?php

namespace App\Observers;

use Modules\Content\Entities\Content;
use Modules\Content\Entities\ContentMeta;
use App\Term;
use App\TermTaxonomy;
use App\Managers\TaxonomyManager;

class ContentObserver
{

    public function created(Content $content)
    {
    }

    public function updating(Content $content)
    {
        if ($content->isDirty('status') && $content->status == Content::STATUS_PUBLISHED &&
            $content->isDirty('visibility') && $content->visibility == Content::VISIBILITY_PUBLIC) {

            // Start my listings when I submit them
            if ($content->metaValue('auctionStart') == 'start') {
                $meta = new ContentMeta();
                $meta->content_id = $content->id;
                $meta->key = 'startsAt';
                $meta->value = date("Y-m-d H:i:s");
                $meta->save();
            }
        }
    }

    public function deleting(Content $content)
    {
    }

    public function incrementCount($key, $value) {
        $term = Term::where('name', $value)->first();
        if ($term && $term->group && $key == $term->group->metaValue('metaKey') && $term->taxonomy) {
            $term->taxonomy->increment('count');
            $term->taxonomy->save();
        }
    }

    public function decrementCount($key, $value) {
        $term = Term::where('name', $value)->first();
        if ($term && $term->group && $key == $term->group->metaValue('metaKey') && $term->taxonomy) {
            $term->taxonomy->decrement('count');
            $term->taxonomy->save();
        }
    }
}
