<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => '管理員',
            'account' => 'hsct',
            'password' => Hash::make('yechoo'),
        ]);
//        User::factory()
//            ->count(3)
//            ->create();
    }
}
