<?php

namespace Modules\Advertisement\Entities;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    const STATUS_ACTIVE = 'active';
    const STATUS_DRAFT = 'draft';

    const STATUS_ARRAY = [
        self::STATUS_ACTIVE,
        self::STATUS_DRAFT
    ];

    public function location()
    {
        return $this->hasOne('Modules\Advertisement\Entities\BannerLocation', 'id', 'location_id');
    }
}
