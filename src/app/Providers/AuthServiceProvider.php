<?php

namespace App\Providers;

/*******************************************************************
*** File Name           : AuthServiceProvider.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28
*** Purpose             : ゲートとポリシーの登録
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = // ポリシー
    [
    ];

/****************************************************************************
*** Function Name       : boot()
*** Designer            : なし(デフォルトのファイル)
*** Date			    : 2022.06.28
*** Function            : ポリシーを登録する
*** Return              : なし
****************************************************************************/

    public function boot()
    {
        $this->registerPolicies();
    }
}
