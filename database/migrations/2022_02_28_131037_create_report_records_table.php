<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id')->comment('個案編號');
            $table->date('date')->comment('日期');
            $table->string('physical_strength')->comment('體力狀況');
            $table->string('symptom')->comment('症狀');
            $table->string('hospital')->comment('醫院');
            $table->timestamps();
        });
        Schema::table('report_records', function (Blueprint $table) {
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
        Schema::dropIfExists('report_records');
    }
}
