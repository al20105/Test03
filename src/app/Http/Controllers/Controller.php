<?php

namespace App\Http\Controllers;

/*******************************************************************
*** File Name           : Controller.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : コントローラーの定義を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    // 継承
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
}
