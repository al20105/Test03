<?php

/*******************************************************************
*** File Name           : cors.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : CORSの設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

return
[
    'paths' =>
    [
        'api/*',
        'sanctum/csrf-cookie'
    ],

    'allowed_methods' =>
    [
        '*'
    ],

    'allowed_origins' =>
    [
        '*'
    ],

    'allowed_origins_patterns' =>
    [
    ],

    'allowed_headers' =>
    [
        '*'
    ],

    'exposed_headers' =>
    [
    ],

    'max_age' => 0,

    'supports_credentials' => false,

];
