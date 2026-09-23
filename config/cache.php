<?php

return [
    'default' => env('CACHE_DRIVER', 'file'),
    'stores' => [
        'array' => ['driver' => 'array'],
        'database' => [
            'driver' => 'database',
            'table' => 'cache',
            'connection' => null,
        ],
        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
        ],
    ],
    'prefix' => 'parkir_premium_',
];
