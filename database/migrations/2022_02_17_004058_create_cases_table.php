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

            $table->unsignedBigInteger('hometown_id')->comment('籍貫編號');
            $table->string('hometown_other')->comment('籍貫其他')->nullable();
            $table->unsignedBigInteger('education_id')->comment('教育程度編號');
            $table->unsignedBigInteger('marriage_id')->comment('婚姻編號');
            $table->unsignedBigInteger('religion_id')->comment('宗教編號');
            $table->string('religion_other')->comment('宗教其他')->nullable();
            $table->unsignedBigInteger('profession_id')->comment('職業編號');
            $table->unsignedBigInteger('profession_detail_id')->comment('職業細節編號');
            $table->unsignedBigInteger('income_id')->comment('收入編號');
            $table->unsignedBigInteger('source_id')->comment('來源人數編號');

            $table->date('diagnosed')->comment('確診日期');

            $table->date('date')->comment('個案移植日期');
            $table->unsignedBigInteger('transplant_type_id')->comment('個案移植種類編號');
            $table->string('transplant_type_other')->comment('個案移植種類其他')->nullable();
            $table->unsignedBigInteger('disease_type_id')->comment('個案疾病種類編號');
            $table->string('disease_type_other')->comment('個案疾病種類其他')->nullable();
            $table->unsignedBigInteger('disease_state_id')->comment('個案疾病分期編號');
            $table->unsignedBigInteger('disease_class_id')->comment('個案疾病分類編號');
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
