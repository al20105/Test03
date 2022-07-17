<?php

/*******************************************************************
*** File Name           : auth.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : 認証設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

return
[
    'defaults' =>
    [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' =>
    [
        'web' =>
        [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    'providers' =>
    [
        'users' =>
        [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    'passwords' =>
    [
        'users' =>
        [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
