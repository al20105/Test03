<?php

/*******************************************************************
*** File Name           : auth.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28
*** Purpose             : Authentication Defaultsなどの定義
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
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
