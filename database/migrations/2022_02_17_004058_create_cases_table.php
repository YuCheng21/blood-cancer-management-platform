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
            $table->enum('gender', ['-', '男性', '女性'])->comment('個案性別');
            $table->date('birthday')->comment('個案生日');
            $table->date('date')->comment('個案移植日期');
            $table->enum('transplantType', ['-', '自體移植', '異體移植'])->comment('個案移植種類');
            $table->enum('diseaseType', ['-', 'AML', 'ALL', 'MM', '4', '何杰金氏淋巴癌', '非何杰金氏淋巴癌'])->comment('個案疾病種類');
            $table->enum('diseaseState', ['-', '第一期', '第二期', '第三期', '第四期'])->comment('個案疾病分期');
            $table->enum('diseaseClass', ['-', 'B-cell', 'T-cell', 'Mantle-cell', '邊緣 B-cell', '其他型'])->comment('個案疾病分類');
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
