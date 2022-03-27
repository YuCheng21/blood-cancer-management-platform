<?php

namespace Database\Seeders;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Message::factory()
//            ->count(5)
//            ->create();

        Message::create([
            'title' => '歡迎使用血癌照護平台',
            'content' => '歡迎使用血癌照護平台',
            'user_id' => 1,
            'date' => Carbon::today()->toDateString(),
        ]);
        Message::create([
            'title' => '歡迎使用血癌照護系統',
            'content' => '歡迎使用血癌照護系統，操作上有任何問題可查看操作指南影片或詢問負責人員。',
            'user_id' => 1,
            'date' => Carbon::today()->toDateString(),
        ]);
    }
}
