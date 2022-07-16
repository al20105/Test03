<?php

namespace App\Providers;

/*******************************************************************
*** File Name           : BroadcastServiceProvider.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28
*** Purpose             : サービスプロバイダのブロードキャスト設定
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
/****************************************************************************
*** Function Name       : boot()
*** Designer            : なし(デフォルトのファイル)
*** Date			    : 2022.06.28
*** Function            : 認証ルートを定義する
*** Return              : パス
****************************************************************************/
    public function boot()
    {
        Broadcast::routes();

        require base_path('routes/channels.php');
    }
}
