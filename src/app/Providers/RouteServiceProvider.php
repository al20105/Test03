<?php

namespace App\Providers;

/*******************************************************************
*** File Name           : RouteServiceProvider.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28
*** Purpose             : サービスプロバイダのルート設定
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/home'; // 認証後リダイレクト先のhomeへのパス

/****************************************************************************
*** Function Name       : boot()
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28
*** Function            : ルートモデルバインディングに関する設定を行う
*** Return              : なし
****************************************************************************/    

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function ()
        {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

/****************************************************************************
*** Function Name       : boot()
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28
*** Function            : レート制限の設定を行う
*** Return              : なし
****************************************************************************/    

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request)
        {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    protected $namespace = 'App\\Http\\Controllers'; // 名前空間
}
