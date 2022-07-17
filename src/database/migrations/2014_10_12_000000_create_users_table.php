<?php

/*******************************************************************
*** File Name           : 2014_10_12_000000_create_users_table.php
*** Version             : V1.0
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Purpose             : アカウント情報のマイグレーションフォルダ
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
*** Function            : usersテーブルを作成する
*** Return              : なし
****************************************************************************/

    public function up()
    {
        Schema::create('users', function ( Blueprint $table ) // ブループリント
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
*** Designer            : 秋葉 星輝
*** Date                : 2022.06.28
*** Function            : usersテーブルを削除する
*** Return              : なし
****************************************************************************/

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
