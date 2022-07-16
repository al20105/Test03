<?php

namespace App\Http\Controllers\Task;

/*******************************************************************
*** File Name           : GetUser.php
*** Version             : V1.0
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.13
*** Purpose             : ユーザーを取得する
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 秋葉 星輝, 2022.06.13 作成
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

trait GetUser
{

/****************************************************************************
*** Function Name       : __construct()
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.13
*** Function            : 新しいコントローラーのインスタンスを生成する
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
