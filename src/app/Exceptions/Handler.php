<?php

namespace App\Exceptions;

/*******************************************************************
*** File Name           : Handler.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28 
*** Purpose             : 例外タイプに関する定義
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $levels = [ // カスタムログレベルを格納する配列

    ];

    protected $dontReport = [ // レポートされない例外タイプを格納する配列
    ];

    protected $dontFlash = [ // 検証の例外でフラッシュされない入力の配列
        'current_password',
        'password',
        'password_confirmation',
    ];

/****************************************************************************
*** Function Name       : register()
*** Designer            : なし(デフォルトのファイル)
*** Date			    : 2022.06.28
*** Function            : アプリケーションの例外処理のコールバックを登録する
*** Return              : なし
****************************************************************************/

    public function register()
    {
        $this->reportable(function (Throwable $e) // 例外
        {
        });
    }
}
