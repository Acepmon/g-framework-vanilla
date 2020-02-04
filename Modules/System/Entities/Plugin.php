<?php

namespace Modules\System\Entities;

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
    const UNINSTALLED = 'uninstalled';
    //const UPDATING = 'updating';

    const STATUS_ARRAY = [
        self::AVAILABLE,
        self::DOWNLOADING,
        self::INSTALLING,
        self::ACTIVATED,
        self::DEACTIVATED,
        self::FAILED,
        self::UPDATING,
        self::UNINSTALLED
    ];
}
