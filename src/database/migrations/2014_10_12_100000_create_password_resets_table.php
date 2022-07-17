<?php

/*******************************************************************
*** File Name           : 2014_10_12_100000_create_password_resets_table.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : パスワードリセットのマイグレーションフォルダ
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
*** Function            : password_resetsテーブルを作成する
*** Return              : なし
****************************************************************************/

    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) // ブループリント
        {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

/****************************************************************************
*** Function Name       : down()
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : password_resetsテーブルを削除する
*** Return              : なし
****************************************************************************/

    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
};
