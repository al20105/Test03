<?php

namespace App\Http\Middleware;

/*******************************************************************
*** File Name           : PreventRequestsDuringMaintenance.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28 
*** Purpose             : メンテナンス中のリクエスト設定
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    protected $except = [ // メンテナンス中にアクセス可能なURI
    ];
}
