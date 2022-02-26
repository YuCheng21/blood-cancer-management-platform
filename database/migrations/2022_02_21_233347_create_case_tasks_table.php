<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id')->comment('任務編號');
            $table->unsignedBigInteger('week')->comment('週數');
            $table->timestamp('start_at')->comment('開始日期')->nullable();
            $table->timestamp('end_at')->comment('結束日期')->nullable();
            $table->enum('state', ['completed', 'uncompleted'])->comment('完成狀態');
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
        Schema::dropIfExists('case_tasks');
    }
}
