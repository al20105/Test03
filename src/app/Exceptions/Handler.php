<?php

namespace App\Exceptions;

/*******************************************************************
***  File Name		:Handler.php
***  Version		: V1.0
***  Designer		: 
***  Date			: 
***  Purpose       	: 
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : , 2022.06.13
*/

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $levels = [ // A list of exception types with their corresponding custom log levels.

    ];

    protected $dontReport = [ // A list of the exception types that are not reported.
    ];

    protected $dontFlash = [ // A list of the inputs that are never flashed to the session on validation exceptions.
        'current_password', // 現在のパスワード
        'password', // パスワード
        'password_confirmation', // パスワード(確認用)
    ];

/****************************************************************************
*** Function Name       : register()
*** Designer            : 
*** Date                : 
*** Function            : アプリケーションの例外処理のコールバックを登録する
*** Return              : なし
****************************************************************************/

    public function register()
    {
        $this->reportable(function (Throwable $e) {
        });
    }
}
