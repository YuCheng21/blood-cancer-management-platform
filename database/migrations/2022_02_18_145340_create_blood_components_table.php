<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_components', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('名稱');
            $table->timestamps();
        });

        Schema::create('case_blood_components', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('case_id')->comment('個案編號');
            $table->unsignedBigInteger('blood_id')->comment('項目編號');
            $table->double('value')->comment('數值');
            $table->timestamps();
        });

        Schema::table('case_blood_components', function (Blueprint $table){
            $table->foreign('case_id')->references('id')->on('cases')->onDelete('cascade');
            $table->foreign('blood_id')->references('id')->on('blood_components')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blood_components');
    }
}
