<?php

namespace App\Http\Middleware;

/*******************************************************************
*** File Name           : TrustProxies.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : 信用するプロキシの設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    protected $proxies = '**'; // 信用するプロキシ

    protected $headers = // プロキシ検知に使うヘッダ
        Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO |
        Request::HEADER_X_FORWARDED_AWS_ELB;
}
