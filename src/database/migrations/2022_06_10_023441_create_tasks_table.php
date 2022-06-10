<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('task_user')->comment('課題の管理者の区別に用いる');
            $table->string('name')->comment('課題名');
            $table->date('date')->comment('締め切り日時');
            $table->time('time')->comment('締め切り時間');
            $table->text('memo')->nullable()->comment('詳細メモ');
            $table->timestamps();
            $table->softDeletes()->comment('課題削除日の保存に用いる');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
