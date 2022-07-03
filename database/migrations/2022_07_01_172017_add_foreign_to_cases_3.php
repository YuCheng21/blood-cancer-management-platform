<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToCases3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cases', function (Blueprint $table) {
            $table->foreign('experimental_id')->references('id')->on('experimentals');
            $table->foreign('hla_type_id')->references('id')->on('hla_types');
            $table->foreign('transplant_state_id')->references('id')->on('transplant_states');
            $table->foreign('before_blood_type_id')->references('id')->on('before_blood_types');
            $table->foreign('donor_blood_type_id')->references('id')->on('donor_blood_types');
            $table->foreign('after_blood_type_id')->references('id')->on('after_blood_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cases_3', function (Blueprint $table) {
            //
        });
    }
}
