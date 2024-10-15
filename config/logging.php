<?php

return [
    'default' => env('LOG_CHANNEL', 'stderr'), 

    'channels' => [
        'stderr' => [
            'driver' => 'stderr',
            'level' => 'debug',
        ],
    ],
];
