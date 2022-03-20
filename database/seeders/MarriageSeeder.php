<?php

namespace Database\Seeders;

use App\Models\Marriage;
use Illuminate\Database\Seeder;

class MarriageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marriage::create([
            'name' => '未選擇'
        ]);
        Marriage::create([
            'name' => '未婚'
        ]);
        Marriage::create([
            'name' => '同居'
        ]);
        Marriage::create([
            'name' => '已婚'
        ]);
        Marriage::create([
            'name' => '分居'
        ]);
        Marriage::create([
            'name' => '離婚'
        ]);
        Marriage::create([
            'name' => '喪偶'
        ]);
    }
}
