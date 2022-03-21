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
            $table->unsignedBigInteger('physical_strength_id')->comment('體力滿意度編號');
            $table->string('symptom')->comment('症狀');
            $table->unsignedBigInteger('hospital_id')->comment('醫院編號');
            $table->string('hospital_other')->comment('醫院其他')->nullable();
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
