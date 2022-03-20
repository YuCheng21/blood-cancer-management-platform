<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToCases2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cases', function (Blueprint $table) {
            $table->foreign('hometown_id')->references('id')->on('hometowns');
            $table->foreign('education_id')->references('id')->on('education');
            $table->foreign('marriage_id')->references('id')->on('marriages');
            $table->foreign('religion_id')->references('id')->on('religions');
            $table->foreign('profession_id')->references('id')->on('professions');
            $table->foreign('profession_detail_id')->references('id')->on('profession_details');
            $table->foreign('income_id')->references('id')->on('incomes');
            $table->foreign('source_id')->references('id')->on('sources');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cases_2', function (Blueprint $table) {
            //
        });
    }
}
