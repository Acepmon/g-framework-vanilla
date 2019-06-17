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
}
