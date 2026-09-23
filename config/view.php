<?php

return [
    'paths' => [
        'app' => storage_path('framework/views'),
    ],
    'compiled' => env('VIEW_COMPILED_PATH', realpath(storage_path('framework/views'))),
];
