<?php

namespace App\Providers;

/*******************************************************************
*** File Name           : EventServiceProvider.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28
*** Purpose             : サービスプロバイダのイベント設定
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
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
*** Function Name       : boot()
*** Designer            : なし(デフォルトのファイル)
*** Date			    : 2022.06.28
*** Function            : 何も行わない
*** Return              : なし
****************************************************************************/

    public function boot()
    {
    }

/****************************************************************************
*** Function Name       : shouldDiscoverEvents()
*** Designer            : なし(デフォルトのファイル)
*** Date			    : 2022.06.28
*** Function            : 偽を返す
*** Return              : 偽
****************************************************************************/

    public function shouldDiscoverEvents()
    {
        return false;
    }
}
