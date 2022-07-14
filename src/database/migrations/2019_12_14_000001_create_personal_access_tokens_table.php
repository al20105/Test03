<?php

/*******************************************************************
***  File Name		: 2019_12_14_000001_create_personal_access_tokens_table.php
***  Version		: V1.0
***  Designer		: 平佐 竜也
***  Date			: 2022.06.28
***  Purpose       	: アクセストークンのマイグレーションファイル
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
        Schema::create('personal_access_tokens', function (Blueprint $table) // スキーマビルダ
        {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('personal_access_tokens');
    }
};
