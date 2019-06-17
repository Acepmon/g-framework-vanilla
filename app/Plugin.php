<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plugin extends Model
{
    const AVAILABLE = 'available';
    const DOWNLOADING = 'downloading';
    const INSTALLING = 'installing';
    const ACTIVATED = 'activated';
    const DEACTIVATED = 'deactivated';
    const FAILED = 'failed';
    const UPDATING = 'updating';

    const STATUS_ARRAY = [
        self::AVAILABLE,
        self::DOWNLOADING,
        self::INSTALLING,
        self::ACTIVATED,
        self::DEACTIVATED,
        self::FAILED,
        self::UPDATING
    ];
}
