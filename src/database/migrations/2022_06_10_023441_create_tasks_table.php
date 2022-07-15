<?php

/*******************************************************************
***  File Name		: 2022_06_10_023441_create_tasks_table.php
***  Version		: V1.0
***  Designer		: 平佐 竜也
***  Date			: 2022.06.28
***  Purpose       	: 課題情報のマイグレーションファイル
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 平佐 竜也, 2022.06.28
*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

/****************************************************************************
*** Function Name       : up()
*** Designer            : 平佐 竜也
*** Date                : 2022.06.28
*** Function            : データベースに新しいテーブルを追加する
*** Return              : なし
****************************************************************************/

    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) // スキーマビルダ
        {
            $table->id();
            $table->integer('user_id')->comment('課題の管理者の区別に用いる');
            $table->string('name')->comment('課題名');
            $table->date('date')->comment('締め切り日時');
            $table->time('time')->comment('締め切り時間');
            $table->text('memo')->nullable()->comment('詳細メモ');
            $table->timestamps();
            $table->softDeletes()->comment('課題削除日の保存に用いる');
        });
    }

/****************************************************************************
*** Function Name       : down()
*** Designer            : 平佐 竜也
*** Date                : 2022.06.28
*** Function            : データベースを以前の状態に戻す
*** Return              : なし
****************************************************************************/

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
