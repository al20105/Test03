<?php

/*******************************************************************
*** File Name           : 2022_06_21_165002_create_tags_table.php
*** Version             : V1.0
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Purpose             : タグ情報のマイグレーションフォルダ
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
*** Function            : tagsテーブルを作成する
*** Return              : なし
****************************************************************************/

    public function up()
    {
        Schema::create('tags', function (Blueprint $table) // ブループリント
        {
            $table->id();
            $table->string('name')->comment('課題名');
            $table->timestamps();
            $table->softDeletes()->comment('安全な削除処理に必要');
        });
    }

/****************************************************************************
*** Function Name       : down()
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Function            : tagsテーブルを削除する
*** Return              : なし
****************************************************************************/

    public function down()
    {
        Schema::dropIfExists('tags');
    }
};
