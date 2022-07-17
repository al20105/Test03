<?php

use Laravel\Sanctum\Sanctum;

/*******************************************************************
*** File Name           : sanctum.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : サンクタムの設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

return
[
    'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', sprintf(
        '%s%s',
        'localhost,localhost:3000,127.0.0.1,127.0.0.1:8000,::1',
        Sanctum::currentApplicationUrlWithPort()
    ))),

    'guard' => [
        'web'
    ],

    'expiration' => null,

    'middleware' =>
    [
        'verify_csrf_token' => App\Http\Middleware\VerifyCsrfToken::class,
        'encrypt_cookies' => App\Http\Middleware\EncryptCookies::class,
    ],

];
