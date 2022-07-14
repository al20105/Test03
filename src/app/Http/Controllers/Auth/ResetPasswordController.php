<?php

namespace App\Http\Controllers\Auth;

/*******************************************************************
***  File Name		: ResetPasswordController.php
***  Version		: V1.0
***  Designer		: 
***  Date			: 
***  Purpose       	:     | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : , 2022.06.13
*/

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{

    use ResetsPasswords; // 継承

    protected $redirectTo = RouteServiceProvider::HOME; // homeのURLをリダイレクトパスに設定
}
