<?php

namespace Modules\System\Entities;

use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    const IN_PROGRESS = 'in progress';
    const COMPLETED = 'completed';
    const FAILED = 'failed';
    const PREPARING = 'preparing';
    const RESTORED = 'restored';
    const DELETED = 'deleted';

    const STATUS_ARRAY = [
        self::IN_PROGRESS,
        self::COMPLETED,
        self::FAILED,
        self::PREPARING,
        self::RESTORED,
        self::DELETED
    ];
}
