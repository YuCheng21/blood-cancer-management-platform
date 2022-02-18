<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BloodComponent;

class BloodComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BloodComponent::create([
            'case_id' => '1',
            'wbc' => 999,
            'hb' => 999,
            'plt' => 999,
            'got' => 999,
            'gpt' => 999,
            'cea' => 999,
            'ca153' => 999,
            'bun' => 999,
        ]);
    }
}
