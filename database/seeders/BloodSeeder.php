<?php

namespace Database\Seeders;

use App\Models\BloodInfo;
use Illuminate\Database\Seeder;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BloodInfo::create([
            'account' => 'user1',
            'wbc' => 123,
            'hb' => 123,
            'plt' => 123,
            'got' => 123,
            'gpt' => 123,
            'cea' => 123,
            'ca153' => 123,
            'bun' => 123,
        ]);
    }
}
