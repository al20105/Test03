<?php

namespace App\Http\Middleware;

/*******************************************************************
***  File Name		: RedirectIfAuthenticated.php
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

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
/****************************************************************************
*** Function Name       : handle( Request $request, Closure $next, ...$guards )
*** Designer            : 
*** Date                : 
*** Function            : * Handle an incoming request.     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse

*** Return              : なし
****************************************************************************/
    public function handle(Request $request, // 
                           Closure $next, // 
                           ...$guards) // 
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard)
        {
            if (Auth::guard($guard)->check())
            {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
