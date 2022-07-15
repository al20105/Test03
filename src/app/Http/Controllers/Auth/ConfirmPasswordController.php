<?php

namespace App\Http\Controllers\Auth;

/*******************************************************************
***  File Name		: ConfirmPasswordController.php
***  Version		: V1.0
***  Designer		: 
***  Date			: 
***  Purpose       	: This controller is responsible for handling password confirmations and uses a simple trait to include the behavior. You're free to explore this trait and override any functions that require customization.
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : , 2022.06.13
*/

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    use ConfirmsPasswords; // 継承

    protected $redirectTo = RouteServiceProvider::HOME; // homeのURLをリダイレクトパスに設定

/****************************************************************************
*** Function Name       : __construct()
*** Designer            : 
*** Date                : 
*** Function            : 新しいコントローラーのインスタンスを生成する
*** Return              : なし
****************************************************************************/

    public function __construct()
    {
        $this->middleware('auth');
    }
}
