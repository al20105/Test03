<?php

namespace App\Http\Middleware;

/*******************************************************************
*** File Name           : TrimStrings.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : トリムされない属性名設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    protected $except = // トリムされない属性名
    [
        'current_password',
        'password',
        'password_confirmation',
    ];
}
