<?php

namespace App\Http\Controllers\Auth;

/*******************************************************************
***  File Name		: ForgotPasswordController.php
***  Version		: V1.0
***  Designer		: 
***  Date			: 
***  Purpose       	:  This controller is responsible for handling password reset emails and includes a trait which assists in sending these notifications from your application to your users. Feel free to explore this trait.
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : , 2022.06.13
*/

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails; // 継承
}
