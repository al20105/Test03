<?php

namespace App\Http\Middleware;

/*******************************************************************
*** File Name           : VerifyCsrfToken.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28
*** Purpose       	    : CSRDの認証設定
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = // CSRFの認証から除外するURL
    [
    ];
}
