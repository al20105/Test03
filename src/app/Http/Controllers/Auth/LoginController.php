<?php
/*******************************************************************
*** File Name           : form.php
*** Version             : V1.0
*** Designer            : 里田 侑声
*** Date                : 2022.06.28
*** Purpose             : ログインを行う。
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 里田 侑声, 2022.06.28
*/

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/login'; // リダイレクト先

/****************************************************************************
*** Function Name       : __construct()
*** Designer            : 里田 侑声
*** Date                : 2022.06.28
*** Function            : 新しいインスタンスを生成する。
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
*** Function            : ログイン画面を表示する。
*** Return              : リダイレクト
****************************************************************************/

    protected function loggedOut( Request $request ) // リクエスト
    {
        return redirect('/login');
    }
}
