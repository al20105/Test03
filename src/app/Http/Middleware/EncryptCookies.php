<?php

namespace App\Http\Middleware;

/*******************************************************************
***  File Name		: EncryptCookies.php
***  Version		: V1.0
***  Designer		: 
***  Date			: 
***  Purpose       	: 
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : , 2022.06.13
*/

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    protected $except = [ // * The names of the cookies that should not be encrypted.
    ];
}
