<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_info', function (Blueprint $table) {
            $table->id();
            $table->string('account', 100)->comment('個案帳號');
            $table->double('wbc', 8, 2)->comment('白血球(WBC)')->nullable();
            $table->double('hb', 8, 2)->comment('血紅素(HB)')->nullable();
            $table->double('plt', 8, 2)->comment('血小板(PLT)')->nullable();
            $table->double('got', 8, 2)->comment('肝指數(GOT)')->nullable();
            $table->double('gpt', 8, 2)->comment('肝指數(GPT)')->nullable();
            $table->double('cea', 8, 2)->comment('癌指數(CEA)')->nullable();
            $table->double('ca153', 8, 2)->comment('癌指數(CA153)')->nullable();
            $table->double('bun', 8, 2)->comment('尿素氮(BUN)')->nullable();
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
        Schema::dropIfExists('blood_info');
    }
}
