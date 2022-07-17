<?php

namespace App\Providers;

/*******************************************************************
*** File Name           : AppServiceProvider.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : アプリのサービスプロバイダ設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

/****************************************************************************
*** Function Name       : register()
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : 登録を行う
*** Return              : なし
****************************************************************************/

    public function register()
    {
    }

/****************************************************************************
*** Function Name       : boot()
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
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
