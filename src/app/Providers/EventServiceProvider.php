<?php

namespace App\Providers;

/*******************************************************************
***  File Name		: EventServiceProvider.php
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

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen =
    [
        Registered::class =>
        [
            SendEmailVerificationNotification::class,
        ],
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
    }

/****************************************************************************
*** Function Name       :shouldDiscoverEvents()
*** Designer            : 
*** Date                : 
*** Function            : 
*** Return              : 
****************************************************************************/
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
