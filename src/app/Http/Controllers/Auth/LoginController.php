<?php

namespace App\Http\Controllers\Auth;

/*******************************************************************
*** File Name           : form.php
*** Version             : V1.0
*** Designer            : 里田 侑声
*** Date                : 2022.06.28
*** Purpose             : ログインを行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 里田 侑声, 2022.06.28
*/

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers; // 継承

    protected $redirectTo = '/login'; // リダイレクトパス

/****************************************************************************
*** Function Name       : __construct()
*** Designer            : 里田 侑声
*** Date                : 2022.06.28
*** Function            : コントローラーのインスタンス生成を行う
*** Return              : なし
****************************************************************************/

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

/****************************************************************************
*** Function Name       : loggedOut( Request $request )
*** Designer            : 佐藤 駿介
*** Date                : 2022.06.28
*** Function            : ログイン画面表示を行う
*** Return              : リダイレクト
****************************************************************************/

    protected function loggedOut( Request $request ) // HTTPリクエスト
    {
        return redirect('/login');
    }
}
