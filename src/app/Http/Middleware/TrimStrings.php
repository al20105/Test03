<?php

namespace App\Http\Middleware;

/*******************************************************************
*** File Name           : TrimStrings.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28 
*** Purpose             : トリム処理の設定
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    protected $except = // トリミングしてはいけない属性名
    [
        'current_password',
        'password',
        'password_confirmation',
    ];
}
