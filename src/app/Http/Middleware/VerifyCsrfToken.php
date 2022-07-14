<?php

namespace App\Http\Middleware;

/*******************************************************************
***  File Name		: VerifyCsrfToken.php
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

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = //  * The URIs that should be excluded from CSRF verification.
    [
    ];
}
