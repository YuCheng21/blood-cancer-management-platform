<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Religion::create([
            'name' => '未選擇'
        ]);
        Religion::create([
            'name' => '無'
        ]);
        Religion::create([
            'name' => '佛教'
        ]);
        Religion::create([
            'name' => '基督教'
        ]);
        Religion::create([
            'name' => '天主教'
        ]);
        Religion::create([
            'name' => '回教'
        ]);
        Religion::create([
            'name' => '道教'
        ]);
        Religion::create([
            'name' => '其他'
        ]);
    }
}
