<?php

namespace App\Http\Middleware;

/*******************************************************************
*** File Name           : TrustHosts.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : 信用するHOSTパターンの取得を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{

/****************************************************************************
*** Function Name       : hosts()
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : 信用するHOSTパターンを取得する
*** Return              : HOSTパターン
****************************************************************************/

    public function hosts()
    {
        return
        [
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}
