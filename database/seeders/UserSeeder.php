<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'account' => 'admin',
            'password' => '2u04ru vu4',
            'role' => 'admin',
            "created_at" =>  date('Y-m-d H:i:s'), # new \Datetime()
            "updated_at" => date('Y-m-d H:i:s'),  # new \Datetime()
        ]);
    }
}
