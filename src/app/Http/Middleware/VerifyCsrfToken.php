<?php

namespace App\Http\Middleware;

/*******************************************************************
*** File Name           : VerifyCsrfToken.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : CSRF認証の設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = // CSRF認証から除外するURI
    [
    ];
}
