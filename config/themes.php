<?php

return [
    'name' => 'Themes',
    'install' => [
        'storagePath' => storage_path('app' . DIRECTORY_SEPARATOR . 'themes'),
        'assetPath' => public_path(config('app.asset_url')),
        'viewPath' => resource_path('views' . DIRECTORY_SEPARATOR . 'themes')
    ]
];
