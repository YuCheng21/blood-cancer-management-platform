<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id')->comment('個案編號');
            $table->dateTime('date')->comment('日期');
            $table->string('name')->comment('影片名稱');
            $table->unsignedBigInteger('duration')->comment('影片時長')->nullable();
            $table->unsignedBigInteger('end')->comment('結束時間');
            $table->unsignedBigInteger('start')->comment('開始時間')->nullable();
            $table->timestamps();
        });
        Schema::table('video_records', function (Blueprint $table) {
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
        Schema::dropIfExists('video_records');
    }
}
