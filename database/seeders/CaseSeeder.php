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
            'transplantNum' => 'N0001',
            'name' => '王小明1',
            'gender' => '2',
            'birthday' => '1999-06-21',
            'date' => '2022-02-17',
            'transplantType' => '3',
            'diseaseType' => '2',
            'diseaseState' => '3',
            'diseaseClass' => '4',
        ]);
        CaseModel::create([
            'account' => 'user2',
            'password' => 'password2',
            'transplantNum' => 'N0002',
            'name' => '王小明2',
            'gender' => '3',
            'birthday' => '1999-06-22',
            'date' => '2022-02-12',
            'transplantType' => '2',
            'diseaseType' => '2',
            'diseaseState' => '3',
            'diseaseClass' => '4',
        ]);
        CaseModel::create([
            'account' => 'user3',
            'password' => 'password3',
            'transplantNum' => 'N0003',
            'name' => '王小明3',
            'gender' => '1',
            'birthday' => '1999-06-23',
            'date' => '2022-02-13',
            'transplantType' => '2',
            'diseaseType' => '3',
            'diseaseState' => '3',
            'diseaseClass' => '4',
        ]);
    }
}
