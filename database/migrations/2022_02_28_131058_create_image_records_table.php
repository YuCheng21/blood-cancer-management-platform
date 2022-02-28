<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id')->comment('個案編號');
            $table->date('date')->comment('日期');
            $table->string('path')->comment('路徑');
            $table->timestamps();
        });
        Schema::table('image_records', function (Blueprint $table) {
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
        Schema::dropIfExists('image_records');
    }
}
