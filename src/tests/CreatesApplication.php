<?php

namespace Tests;

/*******************************************************************
*** File Name           : CreatesApplication.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28
*** Purpose             : Laravelアプリケーションをブートストラップ
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{

/****************************************************************************
*** Function Name       : createApplication()
*** Designer            : なし(デフォルトのファイル)
*** Date			    : 2022.06.28
*** Function            : アプリケーションの生成
*** Return              : アプリケーション
****************************************************************************/

    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
