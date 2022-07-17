<?php

/*******************************************************************
*** File Name           : hashing.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : ハッシュの設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

return
[
    'driver' => 'bcrypt',

    'bcrypt' =>
    [
        'rounds' => env('BCRYPT_ROUNDS', 10),
    ],

    'argon' =>
    [
        'memory' => 65536,
        'threads' => 1,
        'time' => 4,
    ],

];
