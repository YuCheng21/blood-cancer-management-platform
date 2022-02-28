<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_information', function (Blueprint $table) {
            $table->unsignedBigInteger('category_1')->primary()->unique()->comment('類別編號');
            $table->string('name')->comment('類別名稱');
            $table->string('short')->comment('類別縮寫');
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
        Schema::dropIfExists('category_information');
    }
}
