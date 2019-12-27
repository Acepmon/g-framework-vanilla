<?php

return [
    'name' => 'Content',
    'posts' => [
        'rootPath' => '' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'posts',
        'viewPath' => 'posts',
        'containerPage' => 'posts'
    ],
    'pages' => [
        'rootPath' => '' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'pages',
        'viewPath' => 'pages'
    ],
    'storage' => [
        'host' => env('STORAGE_HOST', 'http://66.181.167.116'),
        'port' => env('STORAGE_PORT', '3000')
    ],
    'cars' => [
        'rootPath' => '' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'pages',
        'viewPath' => 'pages',
        'containerPage' => 'posts'
    ],
    'media' => [
        'thumbnails' => [
            'directory' => storage_path('app/public/thumbnails'),
            'width' => 640,
            'height' => 360
        ],
    ]
];
