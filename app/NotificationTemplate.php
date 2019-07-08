<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationTemplate extends Model
{
    const TYPE_BROADCAST = 'broadcast';
    const TYPE_SMS = 'sms';
    const TYPE_MAIL = 'mail';
    const TYPE_SLACK = 'slack';
    const TYPE_DATABASE = 'database';

    const TYPE_ARRAY = [
        self::TYPE_BROADCAST,
        self::TYPE_SMS,
        self::TYPE_MAIL,
        self::TYPE_SLACK,
        self::TYPE_DATABASE
    ];
}
