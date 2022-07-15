<?php

namespace App\Providers;

/*******************************************************************
***  File Name		: AuthServiceProvider.php
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

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = 
    [
    ];
/****************************************************************************
*** Function Name       :boot()
*** Designer            : 
*** Date                : 
*** Function            : 
*** Return              : 
****************************************************************************/
    public function boot()
    {
        $this->registerPolicies();
    }
}
