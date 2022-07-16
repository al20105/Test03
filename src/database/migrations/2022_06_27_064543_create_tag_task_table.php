<?php

/*******************************************************************
*** File Name           : 2022_06_27_064543_create_tag_task_table.php
*** Version             : V1.0
*** Designer            : 秋葉 星輝 
*** Date                : 2022.06.28
*** Purpose             : タグ情報と課題情報の中間テーブルの
***                       マイグレーションファイル
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 秋葉 星輝, 2022.06.28
*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

/****************************************************************************
*** Function Name       : up()
*** Designer            : 秋葉 星輝 
*** Date                : 2022.06.28
*** Function            : データベースにテーブルtag_taskを追加する
*** Return              : なし
****************************************************************************/

    public function up()
    {
        Schema::create('tag_task', function ( Blueprint $table ) // スキーマビルダ
        {
            $table->id();
            $table->unsignedBigInteger('task_id')->comment('課題id');
            $table->unsignedBigInteger('tag_id')->comment('タグid');
            $table->foreignId('task_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->comment('タグが持つ課題id');
            $table->foreignId('tag_id')->comment('課題が持つタグid');
            $table->timestamps();
        });
    }

/****************************************************************************
*** Function Name       : down()
*** Designer            : 秋葉 星輝 
*** Date                : 2022.06.28
*** Function            : データベースを以前の状態に戻す
*** Return              : なし
****************************************************************************/

    public function down()
    {
        Schema::dropIfExists('tag_task');
    }
};
