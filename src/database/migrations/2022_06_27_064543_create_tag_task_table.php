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
        Schema::create('tag_task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id')->comment('課題id');
            $table->unsignedBigInteger('tag_id')->comment('タグid');
            $table->foreignId('task_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->comment('タグが持つ課題id');
            $table->foreignId('tag_id')->comment('課題が持つタグid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_task');
    }
};
