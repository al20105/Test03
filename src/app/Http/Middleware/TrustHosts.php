<?php

namespace App\Http\Middleware;

/*******************************************************************
***  File Name		: TrustHosts.php
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

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{

/****************************************************************************
*** Function Name       : hosts()
*** Designer            : 
*** Date                : 
*** Function            : Get the host patterns that should be trusted.
*** Return              : array<int, string|null>
****************************************************************************/

    public function hosts()
    {
        return
        [
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}
