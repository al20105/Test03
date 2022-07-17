<?php

namespace Tests;

/*******************************************************************
*** File Name           : CreatesApplication.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : アプリケーション生成設定
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{

/****************************************************************************
*** Function Name       : createApplication()
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : アプリケーション
*** Return              : なし
****************************************************************************/


    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
