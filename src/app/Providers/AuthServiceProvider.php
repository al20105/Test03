<?php

namespace App\Providers;

/*******************************************************************
*** File Name           : AuthServiceProvider.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : 認証のサービスプロバイダ設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = // ポリシー
    [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

/****************************************************************************
*** Function Name       : boot()
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : ポリシーの登録を行う
*** Return              : なし
****************************************************************************/

    public function boot()
    {
        $this->registerPolicies();
    }
}
