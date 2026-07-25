<?php

return [
    'default' => 'local',

    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            // この API は保存ファイルを公開するルートを持たない
            'serve' => false,
            'throw' => false,
            'report' => false,
        ],
    ],
];
