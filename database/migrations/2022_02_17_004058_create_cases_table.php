<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('account', 100)->comment('個案帳號')->unique();
            $table->string('password', 200)->comment('個案密碼');
            $table->string('transplantNum', 100)->comment('移植編號');
            $table->string('name', 20)->comment('個案姓名');
            $table->enum('gender', ['0', '1', '2'])->comment('個案性別')->nullable();
            $table->date('birthday')->comment('個案生日');
            $table->date('date')->comment('個案移植日期');
            $table->enum('transplantType', ['0', '1', '2'])->comment('個案移植種類')->nullable();
            $table->enum('diseaseType', ['0', '1', '2', '3', '4', '5', '6'])->comment('個案疾病種類')->nullable();
            $table->enum('diseaseState', ['0', '1', '2', '3', '4', '5'])->comment('個案疾病分期')->nullable();
            $table->enum('diseaseClass', ['0', '1', '2', '3', '4', '5', '6'])->comment('個案疾病分類')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cases');
    }
}
