<?php

namespace App\Http\Middleware;

/*******************************************************************
*** File Name           : Autheticate.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : 認証されていない場合の画面遷移設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

/****************************************************************************
*** Function Name       : redirectTo( $request )
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : 認証されていない場合のリダイレクトパスを取得する
*** Return              : リダイレクトパス
****************************************************************************/

    protected function redirectTo( $request )
    {
        if (! $request->expectsJson())
        {
            return route('login');
        }
    }
}
