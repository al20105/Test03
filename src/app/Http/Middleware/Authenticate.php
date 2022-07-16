<?php

namespace App\Http\Middleware;

/*******************************************************************
*** File Name           : Authenticate.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28 
*** Purpose             : 未認証の際のリダイレクト先決定
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
/****************************************************************************
*** Function Name       : redirectTo( $request )
*** Designer            : なし(デフォルトのファイル)
*** Date			    : 2022.06.28
*** Function            : リダイレクト先を決定する
*** Return              : パスもしくはなし
****************************************************************************/

protected function redirectTo( $request ) // HTTPリクエスト
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
