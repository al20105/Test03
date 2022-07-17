<?php

namespace App\Providers;

/*******************************************************************
*** File Name           : EventServiceProvider.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : イベントのサービスプロバイダ設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = // 
    [
        Registered::class =>
        [
            SendEmailVerificationNotification::class,
        ],
    ];

/****************************************************************************
*** Function Name       : boot()
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : 何も行わない
*** Return              : なし
****************************************************************************/

    public function boot()
    {
    }

/****************************************************************************
*** Function Name       : shouldDiscoverEvents()
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : Falseを返す
*** Return              : False
****************************************************************************/

    public function shouldDiscoverEvents()
    {
        return false;
    }
}
