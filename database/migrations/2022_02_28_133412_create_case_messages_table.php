<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id')->comment('個案編號');
            $table->unsignedBigInteger('message_id')->comment('消息編號');
            $table->unsignedBigInteger('state')->comment('消息狀態');
            $table->timestamps();
        });
        Schema::table('case_messages', function (Blueprint $table){
            $table->unique(['case_id' ,'message_id']);
        });
        Schema::table('case_messages', function (Blueprint $table) {
            $table->foreign('case_id')->references('id')->on('cases')->onDelete('cascade');
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_messages');
    }
}
