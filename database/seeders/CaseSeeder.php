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
        CaseModel::factory()
            ->count(5)
            ->create();

//        CaseModel::create([
//            'account' => 'user1',
//            'password' => 'password1',
//            'transplant_num' => 'N0001',
//            'name' => '王小明1',
//            'gender_id' => 2,
//            'birthday' => '1999-06-21',
//            'date' => '2022-02-17',
//            'transplant_type_id' => 2,
//            'disease_type_id' => 2,
//            'disease_state_id' => 1,
//            'disease_class_id' => 1,
//        ]);
//        CaseModel::create([
//            'account' => 'user2',
//            'password' => 'password2',
//            'transplant_num' => 'N0002',
//            'name' => '王小明2',
//            'gender_id' => 2,
//            'birthday' => '1999-06-21',
//            'date' => '2022-02-17',
//            'transplant_type_id' => 2,
//            'disease_type_id' => 2,
//            'disease_state_id' => 1,
//            'disease_class_id' => 1,
//        ]);
//        CaseModel::create([
//            'account' => 'user3',
//            'password' => 'password3',
//            'transplant_num' => 'N0003',
//            'name' => '王小明3',
//            'gender_id' => 2,
//            'birthday' => '1999-06-21',
//            'date' => '2022-02-17',
//            'transplant_type_id' => 2,
//            'disease_type_id' => 2,
//            'disease_state_id' => 1,
//            'disease_class_id' => 1,
//        ]);
//        CaseModel::create([
//            'account' => 'user4',
//            'password' => 'password4',
//            'transplant_num' => 'N0004',
//            'name' => '王小明4',
//            'gender_id' => 2,
//            'birthday' => '1999-06-21',
//            'date' => '2022-02-17',
//            'transplant_type_id' => 2,
//            'disease_type_id' => 2,
//            'disease_state_id' => 1,
//            'disease_class_id' => 1,
//        ]);

    }
}
