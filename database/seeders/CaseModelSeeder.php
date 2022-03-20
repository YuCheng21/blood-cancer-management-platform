<?php

namespace Database\Seeders;

use App\Models\CaseModel;
use Illuminate\Database\Seeder;

class CaseModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CaseModel::create([
            'account' => 'user1',
            'password' => 'password',
            'transplant_num' => 'N0001',
            'name' => '王小明1',
            'gender_id' => 2,
            'birthday' => '1999-06-21',

            'hometown_id' => 1,
            'hometown_other' => null,
            'education_id' => 1,
            'marriage_id' => 1,
            'religion_id' => 1,
            'religion_other' => null,
            'profession_id' => 1,
            'profession_detail_id' => 1,
            'income_id' => 1,
            'source_id' => 1,

            'diagnosed' => '2022-02-17',

            'date' => '2022-02-17',
            'transplant_type_id' => 2,
            'disease_type_id' => 2,
            'disease_state_id' => 1,
            'disease_class_id' => 1,
        ]);
        CaseModel::create([
            'account' => 'user2',
            'password' => 'password',
            'transplant_num' => 'N0002',
            'name' => '王小明2',
            'gender_id' => 2,
            'birthday' => '1999-06-21',

            'hometown_id' => 1,
            'hometown_other' => null,
            'education_id' => 1,
            'marriage_id' => 1,
            'religion_id' => 1,
            'religion_other' => null,
            'profession_id' => 1,
            'profession_detail_id' => 1,
            'income_id' => 1,
            'source_id' => 1,

            'diagnosed' => '2022-02-17',

            'date' => '2022-02-17',
            'transplant_type_id' => 2,
            'disease_type_id' => 2,
            'disease_state_id' => 1,
            'disease_class_id' => 1,
        ]);
        CaseModel::factory()
            ->count(5)
            ->create();
    }
}
