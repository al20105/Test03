<?php

namespace App\Console;

/*******************************************************************
*** File Name           : Kernel.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28 
*** Purpose             : コマンドに関する定義
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

/****************************************************************************
*** Function Name       : schedule( Schedule $schedule )
*** Designer            : なし(デフォルトのファイル)
*** Date			    : 2022.06.28
*** Function            : アプリケーションのコマンドスケジュールを定義する
*** Return              : なし
****************************************************************************/

    protected function schedule( Schedule $schedule ) // スケジュール
    {
    }

/****************************************************************************
*** Function Name       : commands()
*** Designer            : なし(デフォルトのファイル)
*** Date			    : 2022.06.28
*** Function            : アプリケーションのコマンドを登録する
*** Return              : なし
****************************************************************************/

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
