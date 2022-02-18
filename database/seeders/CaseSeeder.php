<?php

namespace Database\Seeders;

use App\Models\CaseModel;
use Illuminate\Database\Seeder;

class CaseSeeder extends Seeder
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
            'password' => 'password1',
            'transplant_num' => 'N0001',
            'name' => '王小明1',
            'gender_id' => 1,
            'birthday' => '1999-06-21',
            'date' => '2022-02-17',
            'transplant_type_id' => 1,
            'disease_type_id' => 1,
            'disease_state_id' => 1,
            'disease_class_id' => 1,
        ]);

    }
}
