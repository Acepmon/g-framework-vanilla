<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function children()
    {
        return $this->hasMany('App\Comment', 'parent_id');
    }

    public function metas()
    {
        return $this->hasMany('App\CommentMeta', 'comment_id');
    }
}
