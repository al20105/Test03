<?php

/*******************************************************************
***  File Name		: 2014_10_12_100000_create_password_resets_table.php
***  Version		: V1.0
***  Designer		: 平佐 竜也
***  Date			: 2022.06.28
***  Purpose       	: パスワードリセットのマイグレーションファイル
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
        Schema::create('password_resets', function (Blueprint $table) // スキーマビルダ
        {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
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
        Schema::dropIfExists('password_resets');
    }
};
