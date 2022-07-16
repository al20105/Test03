<?php

namespace App\Http\Controllers\Auth;

/*******************************************************************
*** File Name           : ResetPasswordController.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28 
*** Purpose             : パスワードリセットのリクエストを処理
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{

    use ResetsPasswords; // 継承

    protected $redirectTo = RouteServiceProvider::HOME; // リダイレクトパス
}
