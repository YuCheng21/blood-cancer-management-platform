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

            $table->date('end_date')->comment('收案日期')->nullable();
            $table->unsignedBigInteger('experimental_id')->comment('分組編號')->nullable();

            $table->date('diagnosed')->comment('確診日期');

            $table->date('date')->comment('個案移植日期');
            $table->unsignedBigInteger('transplant_type_id')->comment('個案移植種類編號');
            $table->string('transplant_type_other')->comment('個案移植種類其他')->nullable();

            $table->unsignedBigInteger('hla_type_id')->comment('異體移植 HLA Type 編號')->nullable();

            $table->string('patient_hla_a1')->comment('病人HLA_A1')->nullable();
            $table->string('patient_hla_a2')->comment('病人HLA_A2')->nullable();
            $table->string('patient_hla_b1')->comment('病人HLA_B1')->nullable();
            $table->string('patient_hla_b2')->comment('病人HLA_B2')->nullable();
            $table->string('patient_hla_c1')->comment('病人HLA_C1')->nullable();
            $table->string('patient_hla_c2')->comment('病人HLA_C2')->nullable();
            $table->string('patient_hla_dr1')->comment('病人HLA_DR1')->nullable();
            $table->string('patient_hla_dr2')->comment('病人HLA_DR2')->nullable();
            $table->string('patient_hla_dq1')->comment('病人HLA_DQ1')->nullable();
            $table->string('patient_hla_dq2')->comment('病人HLA_DQ2')->nullable();
            $table->string('patient_hla_match')->comment('病人HLA_match')->nullable();
            $table->string('donor_hla_a1')->comment('捐贈者HLA_A1')->nullable();
            $table->string('donor_hla_a2')->comment('捐贈者HLA_A2')->nullable();
            $table->string('donor_hla_b1')->comment('捐贈者HLA_B1')->nullable();
            $table->string('donor_hla_b2')->comment('捐贈者HLA_B2')->nullable();
            $table->string('donor_hla_c1')->comment('捐贈者HLA_C1')->nullable();
            $table->string('donor_hla_c2')->comment('捐贈者HLA_C2')->nullable();
            $table->string('donor_hla_dr1')->comment('捐贈者HLA_DR1')->nullable();
            $table->string('donor_hla_dr2')->comment('捐贈者HLA_DR2')->nullable();
            $table->string('donor_hla_dq1')->comment('捐贈者HLA_DQ1')->nullable();
            $table->string('donor_hla_dq2')->comment('捐贈者HLA_DQ2')->nullable();
            $table->string('donor_hla_match')->comment('捐贈者HLA_match')->nullable();

            $table->unsignedBigInteger('disease_type_id')->comment('個案疾病種類編號');

            $table->unsignedBigInteger('transplant_state_id')->comment('移植時的疾病狀態編號')->nullable();
            $table->unsignedBigInteger('before_blood_type_id')->comment('病人移植前血型編號')->nullable();
            $table->unsignedBigInteger('donor_blood_type_id')->comment('捐贈者血型')->nullable();
            $table->unsignedBigInteger('after_blood_type_id')->comment('病人移植後血型編號')->nullable();

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
