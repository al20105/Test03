<?php

/*******************************************************************
*** File Name           : 2019_08_19_000000_create_failed_jobs_table.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : 登録失敗ジョブのマイグレーションフォルダ
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

/****************************************************************************
*** Function Name       : up()
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : failed_jobsテーブルを作成する
*** Return              : なし
****************************************************************************/

    public function up()
    {
        Schema::create('failed_jobs', function (Blueprint $table) // ブループリント
        {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

/****************************************************************************
*** Function Name       : down()
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : failed_jobsテーブルを削除する
*** Return              : なし
****************************************************************************/
    
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
};
