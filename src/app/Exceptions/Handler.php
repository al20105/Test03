<?php

namespace App\Exceptions;

/*******************************************************************
*** File Name           : Handler.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : 例外タイプに関する処理を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{

    protected $levels = // カスタムログレベルを伴う例外タイプ
    [
    ];

    protected $dontReport = // 報告されない例外タイプ
    [
    ];

    protected $dontFlash = // フラッシュされない入力
    [
        'current_password',
        'password',
        'password_confirmation',
    ];

/****************************************************************************
*** Function Name       : register
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : 例外処理コールバックの登録を行う
*** Return              : なし
****************************************************************************/

    public function register()
    {
        $this->reportable(function (Throwable $e) // 例外処理
        {
        });
    }
}
