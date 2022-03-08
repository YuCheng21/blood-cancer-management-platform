<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_topics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_task_id')->comment('個案每週任務編號');
            $table->unsignedBigInteger('topic_id')->comment('題目編號');
            $table->enum('state', ['correct', 'wrong'])->comment('答題狀態');
            $table->timestamps();
        });

        Schema::table('case_topics', function (Blueprint $table){
            $table->unique(['case_task_id', 'topic_id']);
        });

        Schema::table('case_topics', function (Blueprint $table){
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->foreign('case_task_id')->references('id')->on('case_tasks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_topics');
    }
}
