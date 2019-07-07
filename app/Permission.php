<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    const TYPE_CREATE = 'create';
    const TYPE_READ = 'read';
    const TYPE_UPDATE = 'update';
    const TYPE_DELETE = 'delete';
    const TYPE_OTHER = 'other';

    const TYPE_ARRAY = [
        self::TYPE_CREATE,
        self::TYPE_READ,
        self::TYPE_UPDATE,
        self::TYPE_DELETE,
        self::TYPE_OTHER
    ];

    public $timestamps = false;
}
