<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class AttendanceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['status' => '出席'],
            ['status' => '欠席'],
            ['status' => '公欠'],
            ['status' => '早退'],
        ];

        foreach ($statuses as $status) {
            DB::table('attendance_statuses')->insert([
                'status' => $status['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
