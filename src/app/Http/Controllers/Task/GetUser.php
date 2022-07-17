<?php

namespace App\Http\Controllers\Task;

/*******************************************************************
*** File Name           : GetUser.php
*** Version             : V1.0
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Purpose             : アカウント情報取得を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 秋葉 星輝, 2022.06.28
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

trait GetUser
{

/****************************************************************************
*** Function Name       : __construct()
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Function            : コントローラーのインスタンス生成を行う
*** Return              : レスポンス
****************************************************************************/

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware(function ($request, $next)
        {
            $this->user = Auth::user(); // アカウント情報
            View::share('user', $this->user);
            return $next($request);
        });
    }
}
