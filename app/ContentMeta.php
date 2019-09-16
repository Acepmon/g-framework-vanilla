<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentMeta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'content_metas';

    public $timestamps = false;

    const NAMING_CONVENTION = \App\Content::NAMING_CONVENTION;

    public function content()
    {
        return $this->belongsTo('App\Content', 'content_id');
    }

    public function revisionView()
    {
        $revision_value = json_decode($this->value);
        return $revision_value->after->slug . self::NAMING_CONVENTION . $this->content->status . self::NAMING_CONVENTION . $revision_value->datetime;
    }
}
