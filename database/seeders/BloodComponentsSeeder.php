<?php

namespace Database\Seeders;

use App\Models\BloodComponent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        BloodComponent::factory()
//            ->count(10)
//            ->create();
        DB::table('blood_components')->insert([
            'case_id' => '1',
            'wbc' => rand(0, 999),
            'hb' => rand(0, 999),
            'plt' => rand(0, 999),
            'got' => rand(0, 999),
            'gpt' => rand(0, 999),
            'cea' => rand(0, 999),
            'ca153' => rand(0, 999),
            'bun' => rand(0, 999),
            'created_at' => '2022-02-1 00:00:00',
            'updated_at' => '2022-02-1 00:00:00',
        ]);
        DB::table('blood_components')->insert([
            'case_id' => '1',
            'wbc' => rand(0, 999),
            'hb' => rand(0, 999),
            'plt' => rand(0, 999),
            'got' => rand(0, 999),
            'gpt' => rand(0, 999),
            'cea' => rand(0, 999),
            'ca153' => rand(0, 999),
            'bun' => rand(0, 999),
            'created_at' => '2022-02-2 00:00:00',
            'updated_at' => '2022-02-2 00:00:00',
        ]);
        DB::table('blood_components')->insert([
            'case_id' => '1',
            'wbc' => rand(0, 999),
            'hb' => rand(0, 999),
            'plt' => rand(0, 999),
            'got' => rand(0, 999),
            'gpt' => rand(0, 999),
            'cea' => rand(0, 999),
            'ca153' => rand(0, 999),
            'bun' => rand(0, 999),
            'created_at' => '2022-02-3 00:00:00',
            'updated_at' => '2022-02-3 00:00:00',
        ]);
        DB::table('blood_components')->insert([
            'case_id' => '1',
            'wbc' => rand(0, 999),
            'hb' => rand(0, 999),
            'plt' => rand(0, 999),
            'got' => rand(0, 999),
            'gpt' => rand(0, 999),
            'cea' => rand(0, 999),
            'ca153' => rand(0, 999),
            'bun' => rand(0, 999),
            'created_at' => '2022-02-4 00:00:00',
            'updated_at' => '2022-02-4 00:00:00',
        ]);
        DB::table('blood_components')->insert([
            'case_id' => '1',
            'wbc' => rand(0, 999),
            'hb' => rand(0, 999),
            'plt' => rand(0, 999),
            'got' => rand(0, 999),
            'gpt' => rand(0, 999),
            'cea' => rand(0, 999),
            'ca153' => rand(0, 999),
            'bun' => rand(0, 999),
            'created_at' => '2022-02-5 00:00:00',
            'updated_at' => '2022-02-5 00:00:00',
        ]);
        DB::table('blood_components')->insert([
            'case_id' => '1',
            'wbc' => rand(0, 999),
            'hb' => rand(0, 999),
            'plt' => rand(0, 999),
            'got' => rand(0, 999),
            'gpt' => rand(0, 999),
            'cea' => rand(0, 999),
            'ca153' => rand(0, 999),
            'bun' => rand(0, 999),
            'created_at' => '2022-02-6 00:00:00',
            'updated_at' => '2022-02-6 00:00:00',
        ]);
        DB::table('blood_components')->insert([
            'case_id' => '1',
            'wbc' => rand(0, 999),
            'hb' => rand(0, 999),
            'plt' => rand(0, 999),
            'got' => rand(0, 999),
            'gpt' => rand(0, 999),
            'cea' => rand(0, 999),
            'ca153' => rand(0, 999),
            'bun' => rand(0, 999),
            'created_at' => '2022-02-7 00:00:00',
            'updated_at' => '2022-02-7 00:00:00',
        ]);
    }
}
