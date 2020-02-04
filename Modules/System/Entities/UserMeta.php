<?php

namespace Modules\System\Entities;

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
        return $this->belongsTo('Modules\System\Entities\User', 'user_id');
    }
}
