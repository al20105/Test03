<?php

namespace App\Http\Middleware;

/*******************************************************************
*** File Name           : PreventRequestsDuringMaintenance.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : メンテナンス時のURIのアクセス設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    protected $except = // メンテナンス時アクセスできるURI
    [
    ];

}
