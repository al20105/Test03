<?php

/*******************************************************************
*** File Name           : 2019_12_14_000001_create_personal_access_tokens_table.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : アクセストークンのマイグレーションフォルダ
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
*** Function            : personal_access_tokensテーブルを作成する
*** Return              : なし
****************************************************************************/

    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) // ブループリント
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
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : personal_access_tokensテーブルを削除する
*** Return              : なし
****************************************************************************/
    
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
