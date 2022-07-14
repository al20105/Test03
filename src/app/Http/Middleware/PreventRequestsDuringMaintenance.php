<?php

namespace App\Http\Middleware;

/*******************************************************************
***  File Name		: PreventRequestsDuringMaintenance.php
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

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    protected $except = [ // * The URIs that should be reachable while maintenance mode is enabled.
    ];
}
