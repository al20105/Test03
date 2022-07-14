<?php

namespace App\Http\Middleware;

/*******************************************************************
***  File Name		: Authenticate.php
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

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
/****************************************************************************
*** Function Name       : redirectTo( $request )
*** Designer            : 
*** Date                : 
*** Function            : Get the path the user should be redirected to when they are not authenticated.
*** Return              : 文字列もしくはなし
****************************************************************************/

protected function redirectTo( $request ) // 
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
