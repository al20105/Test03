<?php

namespace App\Providers;

/*******************************************************************
*** File Name           : AppServiceProvider.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28
*** Purpose             : サービスコンテナへの登録
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

/****************************************************************************
*** Function Name       : register()
*** Designer            : なし(デフォルトのファイル)
*** Date			    : 2022.06.28
*** Function            : 何も行わない
*** Return              : なし
****************************************************************************/

    public function register()
    {
    }

/****************************************************************************
*** Function Name       : boot()
*** Designer            : なし(デフォルトのファイル)
*** Date			    : 2022.06.28
*** Function            : .envファイルの'APP_ENV'が'ngrok'ならhttps通信をする
*** Return              : なし
****************************************************************************/

    public function boot()
    {
        if(env('APP_ENV') === 'ngrok')
        {
            \URL::forceScheme('https');
        }
    }
}
