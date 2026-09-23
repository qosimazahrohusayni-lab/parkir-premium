<?php

return [
    'default' => env('SESSION_DRIVER', 'file'),
    'stores' => [
        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/sessions'),
        ],
        'database' => [
            'driver' => 'database',
            'table' => 'sessions',
            'connection' => null,
        ],
    ],
    'lottery' => [2, 100],
    'cookie' => env('SESSION_COOKIE', 'parkir_premium_session'),
    'path' => '/',
    'domain' => env('SESSION_DOMAIN'),
    'secure' => env('SESSION_SECURE_COOKIE', false),
    'http_only' => true,
    'same_site' => 'lax',
];
