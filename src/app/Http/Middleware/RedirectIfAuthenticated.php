<?php

namespace App\Http\Middleware;

/*******************************************************************
*** File Name           : RedirectIfAuthenticated.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28 
*** Purpose             : 認証済みの際のリダイレクト先決定
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

/****************************************************************************
*** Function Name       : handle( Request $request, Closure $next, ...$guards )
*** Designer            : なし(デフォルトのファイル)
*** Date			    : 2022.06.28
*** Function            : 受信したリクエストの処理を行う
*** Return              : HTTPレスポンスもしくはHTTPリダイレクトレスポンス
****************************************************************************/

    public function handle(Request $request, // HTTPリクエスト
                           Closure $next, // 無名関数
                           ...$guards) // 可長変引数
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard)
        {
            if (Auth::guard($guard)->check())
            {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
