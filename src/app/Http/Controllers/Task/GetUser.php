<?php
/*******************************************************************
***  File Name		: GetUser.php
***  Version		: V1.0
***  Designer		: 秋葉 星輝
***  Date			: 2022.06.13
***  Purpose       	: ユーザーを取得する
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 秋葉 星輝, 2022.06.13 作成
*/

namespace App\Http\Controllers\Task;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

// ユーザーの取得(継承用)
trait GetUser
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware(function ($request, $next)
        {
            $this->user = Auth::user(); // 認証情報を取得
            View::share('user', $this->user);
            return $next($request);
        });
    }
}
