<?php

namespace App\Http\Controllers\Auth;

/*******************************************************************
*** File Name           : ResetPasswordController.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : パスワードをリセットする場合の処理を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords; // 継承

    protected $redirectTo = RouteServiceProvider::HOME; // リダイレクトパス
}
