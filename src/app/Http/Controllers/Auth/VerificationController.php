<?php

namespace App\Http\Controllers\Auth;

/*******************************************************************
***  File Name		: VerificationController.php
***  Version		: V1.0
***  Designer		: 
***  Date			: 
***  Purpose       	:     | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : , 2022.06.13
*/

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{

    use VerifiesEmails; // 継承

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
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
