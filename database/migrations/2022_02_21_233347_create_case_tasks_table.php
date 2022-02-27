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
            $table->unsignedBigInteger('case_id')->comment('個案編號');
            $table->unsignedBigInteger('task_id')->comment('任務編號');
            $table->unsignedBigInteger('week')->comment('週數');
            $table->date('start_at')->comment('開始日期');
            $table->enum('state', ['completed', 'uncompleted'])->comment('完成狀態');
            $table->timestamps();
        });
        Schema::table('case_tasks', function (Blueprint $table){
            $table->unique(['case_id' ,'task_id', 'week']);
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
