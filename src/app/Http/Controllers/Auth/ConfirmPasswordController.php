<?php

namespace App\Http\Controllers\Auth;

/*******************************************************************
*** File Name           : ConfirmPasswordController.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28 
*** Purpose             : パスワード確認の処理
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
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
*** Designer            : なし(デフォルトのファイル)
*** Date			    : 2022.06.28
*** Function            : 新しいコントローラーのインスタンスを生成する
*** Return              : なし
****************************************************************************/

    public function __construct()
    {
        $this->middleware('auth');
    }
}
