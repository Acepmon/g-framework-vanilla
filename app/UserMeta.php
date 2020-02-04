<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_meta';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
