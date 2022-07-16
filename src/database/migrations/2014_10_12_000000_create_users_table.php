<?php

/*******************************************************************
*** File Name           : 2014_10_12_000000_create_users_table.php
*** Version             : V1.0
*** Designer            : 平佐 竜也
*** Date                : 2022.06.28
*** Purpose             : アカウント情報のマイグレーションファイル
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
*** Function            : データベースにテーブルusersを追加する
*** Return              : なし
****************************************************************************/

    public function up()
    {
        Schema::create('users', function (Blueprint $table) // スキーマビルダ
        {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
