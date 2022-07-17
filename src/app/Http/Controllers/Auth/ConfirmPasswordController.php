<?php

namespace App\Http\Controllers\Auth;

/*******************************************************************
*** File Name           : ConfirmPasswordController.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : パスワード確認を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    use ConfirmsPasswords; // 継承

    protected $redirectTo = RouteServiceProvider::HOME; // リダイレクトパス

/****************************************************************************
*** Function Name       : __construct()
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : コントローラーのインスタンス生成を行う
*** Return              : なし
****************************************************************************/

    public function __construct()
    {
        $this->middleware('auth');
    }
}
