<?php

namespace App\Http\Middleware;

/*******************************************************************
*** File Name           : TrustHosts.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28 
*** Purpose             : 信用するプロキシの設定
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{

/****************************************************************************
*** Function Name       : hosts()
*** Designer            : なし(デフォルトのファイル)
*** Date			    : 2022.06.28
*** Function            : 信用すべきホストパターンを取得する
*** Return              : app.url設定値の全サブドメインにマッチする正規表現
****************************************************************************/

    public function hosts()
    {
        return
        [
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}
