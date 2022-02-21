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
            $table->string('transplant_num', 100)->comment('移植編號');
            $table->string('name', 20)->comment('個案姓名');
            $table->unsignedBigInteger('gender_id')->comment('個案性別編號');
            $table->date('birthday')->comment('個案生日');
            $table->date('date')->comment('個案移植日期');
            $table->unsignedBigInteger('transplant_type_id')->comment('個案移植種類編號');
            $table->unsignedBigInteger('disease_type_id')->comment('個案疾病種類編號');
            $table->unsignedBigInteger('disease_state_id')->comment('個案疾病分期編號');
            $table->unsignedBigInteger('disease_class_id')->comment('個案疾病分類編號');
            $table->unsignedBigInteger('case_task_id')->comment('個案任務編號')->nullable();
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
