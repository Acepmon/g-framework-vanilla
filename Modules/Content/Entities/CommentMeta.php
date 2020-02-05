<?php

namespace Modules\Content\Entities;

use Illuminate\Database\Eloquent\Model;

class CommentMeta extends Model
{
    protected $table = 'comments_meta';
    public $timestamps = false;
}
