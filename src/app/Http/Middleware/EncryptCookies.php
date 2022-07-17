<?php

namespace App\Http\Middleware;

/*******************************************************************
*** File Name           : EncryptCookies.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : クッキーの暗号化設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    protected $except =  // 暗号化非対象のクッキー名
    [
    ];
}
