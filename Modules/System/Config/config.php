<?php

return [
    'name' => 'System',
    'auth' => [
        'adminRedirectPath' => '/admin',
        'operatorRedirectPath' => '/admin',
        'memberRedirectPath' => '/home',
        'guestRedirectPath' => '/home'
    ],
    'register' => [
        'defaultGroup' => '3'
    ],
    'maintenance' => [
        'emails' => ''
    ],
    'themes' => [
        'storagePath' => storage_path('app' . DIRECTORY_SEPARATOR . 'themes'),
        'assetPath' => public_path(config('app.asset_url')),
        'viewPath' => resource_path('views' . DIRECTORY_SEPARATOR . 'themes')
    ]
];
