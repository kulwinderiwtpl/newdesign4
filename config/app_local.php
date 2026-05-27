<?php
return [
    'debug' => filter_var(env('DEBUG', true), FILTER_VALIDATE_BOOLEAN),

    'Security' => [
        'salt' => env('SECURITY_SALT', 'your-salt-here'),
    ],

    'Datasources' => [
        'default' => [
            'host' => 'localhost',
            'username' => 'your_db_user',
            'password' => 'your_db_password',
            'database' => 'your_db_name',
            'url' => env('DATABASE_URL', null),
        ],
    ],

    'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],
];
