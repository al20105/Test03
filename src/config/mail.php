<?php

/*******************************************************************
*** File Name           : mail.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : メールの設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

return
[
    'default' => env('MAIL_MAILER', 'smtp'),

    'mailers' =>
    [
        'smtp' =>
        [
            'transport' => 'smtp',
            'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN'),
        ],

        'ses' =>
        [
            'transport' => 'ses',
        ],

        'mailgun' =>
        [
            'transport' => 'mailgun',
        ],

        'postmark' =>
        [
            'transport' => 'postmark',
        ],

        'sendmail' =>
        [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' =>
        [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' =>
        [
            'transport' => 'array',
        ],

        'failover' =>
        [
            'transport' => 'failover',
            'mailers' =>
            [
                'smtp',
                'log',
            ],
        ],
    ],

    'from' =>
    [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

    'markdown' =>
    [
        'theme' => 'default',

        'paths' =>
        [
            resource_path('views/vendor/mail'),
        ],
    ],

];
