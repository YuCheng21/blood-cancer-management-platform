<?php

namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Source::create([
            'name' => '未選擇'
        ]);
        Source::create([
            'name' => '1 人'
        ]);
        Source::create([
            'name' => '2 人'
        ]);
        Source::create([
            'name' => '3 人'
        ]);
        Source::create([
            'name' => '4 人'
        ]);
        Source::create([
            'name' => '5 人'
        ]);
        Source::create([
            'name' => '6 人'
        ]);
    }
}
