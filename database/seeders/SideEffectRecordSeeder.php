<?php

namespace Database\Seeders;

use App\Models\SideEffectRecord;
use Illuminate\Database\Seeder;

class SideEffectRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SideEffectRecord::factory()
            ->count(5)
            ->create();
    }
}
