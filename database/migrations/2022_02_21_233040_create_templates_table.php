<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('模板名稱');
            $table->unsignedBigInteger('task_id')->comment('任務編號');
            $table->unsignedBigInteger('week')->comment('週數');
            $table->timestamps();
        });
        Schema::table('templates', function (Blueprint $table){
            $table->unique(['name', 'task_id', 'week']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templates');
    }
}
