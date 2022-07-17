<?php

namespace App\Http\Middleware;

/*******************************************************************
*** File Name           : RedirectIfAuthenticated.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : リクエスト処理を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

/****************************************************************************
*** Function Name       : handle( Request $request, Closure $next, ...$guards)
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : リクエストの処理を行う
*** Return              : レスポンス
****************************************************************************/

    public function handle( Request $request, // HTTPリクエスト
                            Closure $next, // 無名関数
                            ...$guards) // 複数のデータ
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
