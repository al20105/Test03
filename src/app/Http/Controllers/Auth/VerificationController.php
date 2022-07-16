<?php

namespace App\Http\Controllers\Auth;

/*******************************************************************
*** File Name           : VerificationController.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28 
*** Purpose             : 電子メール認証の処理
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{

    use VerifiesEmails; // 継承

    protected $redirectTo = RouteServiceProvider::HOME; // リダイレクトパス

/****************************************************************************
*** Function Name       : __construct()
*** Designer            : なし(デフォルトのファイル)
*** Date			    : 2022.06.28
*** Function            : 新しいコントローラーのインスタンスを生成する
*** Return              : なし
****************************************************************************/

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
