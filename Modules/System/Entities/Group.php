<?php

namespace Modules\System\Entities;

use Modules\System\Entities\GroupMeta;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    const TYPE_SYSTEM = 'system'; // System user groups are in the system by default. They cannot be deleted, it is unchanging.
    const TYPE_STATIC = 'static'; // Static user groups are those which are populated manually, that is by the users.
    const TYPE_DYNAMIC = 'dynamic'; // Dynamic user groups are populated and maintained through either a query or a directory server.
    const TYPE_DEALER = 'dealer';

    const TYPE_ARRAY = [
        self::TYPE_SYSTEM,
        self::TYPE_STATIC,
        self::TYPE_DYNAMIC,
        self::TYPE_DEALER
    ];

    protected $fillable = [
        'parent_id', 'title', 'description', 'type'
    ];

    public $timestamps = false;

    public function metas()
    {
        return $this->hasMany('Modules\System\Entities\GroupMeta', 'group_id');
    }

    public function setMetaValue($key, $value) {
        try {
            $meta = $this->metas->where('key', $key)->first();
            if (isset($meta)) {
                $meta->value = $value;
                $meta->save();
                return $meta;
            } else {
                $newMeta = new GroupMeta();
                $newMeta->user_id = $this->id;
                $newMeta->key = $key;
                $newMeta->value = $value;
                $newMeta->save();
                return $newMeta;
            }
        } catch (\Exception $ex) {
            return Null;
        }
        return Null;
    }

    public function menus()
    {
        return $this->belongsToMany('App\Menu', 'group_menu');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_group');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'group_permission')->withPivot('is_granted');
    }

    public function parent()
    {
        return $this->hasOne('Modules\System\Entities\Group', 'id', 'parent_id');
    }

    public function typeClass()
    {
        switch ($this->type) {
            case self::TYPE_SYSTEM: return 'primary';
            case self::TYPE_STATIC: return 'info';
            case self::TYPE_DYNAMIC: return 'warning';
            case self::TYPE_DEALER: return 'warning';
            default: return 'default';
        }
    }

    public function metaValue($key) {
        try {
            $meta = $this->metas->where('key', $key)->first();
            if ($meta)
                return $meta->value;
        } catch (\Exception $ex) {
            return Null;

        }
        return Null;
    }

    public function metasTransform() {
        $arr = [];
        foreach ($this->metas->groupBy('key')->toArray() as $key => $metaValues) {
            if (count($metaValues) > 1) {
                $arr[$key] = array_map(function ($meta) {
                    return $this->isJson($meta['value']) ? json_decode($meta['value']) : $meta['value'];
                }, $metaValues);
            } else {
                $arr[$key] = $this->isJson($metaValues[0]['value']) ? json_decode($metaValues[0]['value']) : $metaValues[0]['value'];
            }
        }
        return $arr;
    }

    private function isJson($string) {
        return ((is_string($string) &&
                (is_object(json_decode($string)) ||
                is_array(json_decode($string))))) ? true : false;
    }
}

