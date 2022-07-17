<?php

namespace App\Console;

/*******************************************************************
*** File Name           : Kernel.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : アプリケーションのコマンド設定を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

/****************************************************************************
*** Function Name       : schedule( Schedule $schedule )
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : コマンドスケジュールの定義を行う
*** Return              : なし
****************************************************************************/

    protected function schedule( Schedule $schedule ) // スケジュール
    {
    }

/****************************************************************************
*** Function Name       : commands()
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : コマンドの登録を行う
*** Return              : なし
****************************************************************************/

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
