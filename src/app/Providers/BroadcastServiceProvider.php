<?php

namespace App\Providers;

/*******************************************************************
***  File Name		: BroadcastServiceProvider.php
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

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
/****************************************************************************
*** Function Name       :boot()
*** Designer            : 
*** Date                : 
*** Function            : 
*** Return              : 
****************************************************************************/
    public function boot()
    {
        Broadcast::routes();

        require base_path('routes/channels.php');
    }
}
