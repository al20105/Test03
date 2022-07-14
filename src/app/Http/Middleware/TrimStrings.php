<?php

namespace App\Http\Middleware;

/*******************************************************************
***  File Name		: TrimStrings.php
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

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    protected $except = // The names of the attributes that should not be trimmed.
    [
        'current_password',
        'password',
        'password_confirmation',
    ];
}
