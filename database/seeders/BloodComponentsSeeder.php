<?php

namespace Database\Seeders;

use App\Models\BloodComponent;
use Carbon\Carbon;
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
        $now = Carbon::now();
        $target_case = '1';
        $items = ['wbc', 'hb', 'plt', 'gpt', 'got', 'cea', 'ca153', 'bun'];
        foreach ($items as $item){
            BloodComponent::create([
                'name' => $item
            ]);
        }
        for ($counter = 1; $counter < 10; $counter++){
            $now->subDay();
            foreach ($items as $key => $value){
                DB::table('case_blood_components')->insert([
                    'case_id' => $target_case,
                    'blood_id' => $key + 1,
                    'value' => rand(0, 999),
                    'created_at' => $now->toDateTimeString(),
                    'updated_at' => $now->toDateTimeString(),
                ]);
            }
        }
    }
}
