<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public static function get($key)
    {
        return self::where('key', $key)->first();
    }

    public static function getValue($key)
    {
        return self::get($key)->value;
    }
}
