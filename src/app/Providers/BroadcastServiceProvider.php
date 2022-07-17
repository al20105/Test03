<?php

namespace App\Providers;

/*******************************************************************
*** File Name           : BroadcastServiceProvider.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : ブロードキャストのサービスプロバイダ設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{

/****************************************************************************
*** Function Name       : boot()
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : ルートをwebミドルウェアグループに設置する
*** Return              : なし
****************************************************************************/

    public function boot()
    {
        Broadcast::routes();
        require base_path('routes/channels.php');
    }
}
