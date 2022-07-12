<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSideEffectRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('side_effect_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id')->comment('個案編號');
            $table->dateTime('date')->comment('日期');
            $table->string('symptom')->comment('症狀');
            $table->string('difficulty')->comment('困擾度')->nullable();
            $table->string('severity')->comment('嚴重度');
            $table->boolean('has_image')->comment('有照片');
            $table->string('path')->comment('路徑')->nullable();
            $table->string('caption')->comment('說明')->nullable();
            $table->timestamps();
        });
        Schema::table('side_effect_records', function (Blueprint $table) {
            $table->foreign('case_id')->references('id')->on('cases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('side_effect_records');
    }
}
