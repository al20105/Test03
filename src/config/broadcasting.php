<?php

/*******************************************************************
*** File Name           : broadcasting.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : ブロードキャストの設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

return
[
    'default' => env('BROADCAST_DRIVER', 'null'),

    'connections' =>
    [

        'pusher' =>
        [
            'driver' => 'pusher',
            'key' => env('PUSHER_APP_KEY'),
            'secret' => env('PUSHER_APP_SECRET'),
            'app_id' => env('PUSHER_APP_ID'),
            'options' =>
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => true,
            ],
            'client_options' =>
            [
                // Guzzle client options: https://docs.guzzlephp.org/en/stable/request-options.html
            ],
        ],

        'ably' =>
        [
            'driver' => 'ably',
            'key' => env('ABLY_KEY'),
        ],

        'redis' =>
        [
            'driver' => 'redis',
            'connection' => 'default',
        ],

        'log' =>
        [
            'driver' => 'log',
        ],

        'null' =>
        [
            'driver' => 'null',
        ],

    ],

];
