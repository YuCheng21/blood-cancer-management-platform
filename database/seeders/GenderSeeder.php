<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::create([
            'name' => '未選擇'
        ]);
        Gender::create([
            'name' => '男性'
        ]);
        Gender::create([
            'name' => '女性'
        ]);
    }
}
