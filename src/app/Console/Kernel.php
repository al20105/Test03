<?php

namespace App\Console;

/*******************************************************************
***  File Name		: Kernel.php
***  Version		: V1.0
***  Designer		: 
***  Date			: 
***  Purpose       	: 
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : , 2022.06.13
*/

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

/****************************************************************************
*** Function Name       : schedule( Schedule $schedule )
*** Designer            : 
*** Date                : 
*** Function            : アプリケーションのコマンドスケジュールを定義する
*** Return              : なし
****************************************************************************/

    protected function schedule( Schedule $schedule ) // 
    {
    }

/****************************************************************************
*** Function Name       : commands()
*** Designer            : 
*** Date                : 
*** Function            : アプリケーションのコマンドを登録する
*** Return              : なし
****************************************************************************/

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
