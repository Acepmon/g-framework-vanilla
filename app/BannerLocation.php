<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerLocation extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    const TYPE_RANDOM = 'random';
    const TYPE_SLIDER = 'slider';
    const TYPE_STICKY = 'sticky';

    const TYPE_ARRAY = [
        self::TYPE_RANDOM,
        self::TYPE_SLIDER,
        self::TYPE_STICKY
    ];

    public function banners()
    {
        return $this->hasMany('App\Banner', 'location_id');
    }
}
