<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id')->comment('任務編號');
            $table->unsignedBigInteger('week')->comment('週數');
            $table->timestamps();
        });
        Schema::table('main_templates', function (Blueprint $table){
            $table->unique(['task_id', 'week']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_templates');
    }
}
