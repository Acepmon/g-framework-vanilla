<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMeta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'groups_meta';
    protected $fillable = ['group_id', 'key', 'value'];

    public function group()
    {
        return $this->belongsTo('App\Group', 'group_id');
    }
}
