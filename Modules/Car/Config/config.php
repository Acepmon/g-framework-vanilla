<?php

return [
    'name' => 'Car',
    'whitelist' => [
        'login',
        'logout',
        'register',
        'home',
        'personal' => [
            'ajax_users_read',
            'ajax_users_update',
            'ajax_users_metas_create',
            'ajax_users_metas_read',
            'ajax_users_metas_update'
        ]
    ],
    'appStoreLink' => 'https://apps.apple.com/mn/app/autoland/id1095930854',
    'playStoreLink' => 'https://play.google.com/store/apps/details?id=autoland.astvision.com.autoland&hl=en_US'
];
