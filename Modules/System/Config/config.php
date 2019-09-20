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
    ]
];
