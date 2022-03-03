<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id')->comment('課程');
            $table->string('question')->comment('題目');
            $table->enum('question_type', ['true-false', 'multiple-choice'])->comment('題型');
            $table->unsignedBigInteger('answer')->comment('解答');
            $table->string('option_a')->nullable()->comment('選項1')->nullable();
            $table->string('option_b')->nullable()->comment('選項2')->nullable();
            $table->string('option_c')->nullable()->comment('選項3')->nullable();
            $table->string('option_d')->nullable()->comment('選項4')->nullable();
            $table->timestamps();
        });
        Schema::table('topics', function (Blueprint $table){
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
    }
}
