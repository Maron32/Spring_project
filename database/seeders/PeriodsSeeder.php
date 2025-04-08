<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PeriodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $periods = [
            [
                'periods' => 1,
                'start_time' => '09:30:00',
                'finish_time' => '11:00:00',
            ],
            [
                'periods' => 2,
                'start_time' => '11:10:00',
                'finish_time' => '12:40:00',
            ],
            [
                'periods' => 3,
                'start_time' => '13:40:00',
                'finish_time' => '15:10:00',
            ],
            [
                'periods' => 4,
                'start_time' => '15:20:00',
                'finish_time' => '16:50:00',
            ],
        ];

        foreach ($periods as $period) {
            DB::table('periods')->insert([
                'periods' => $period['periods'],
                'start_time' => $period['start_time'],
                'finish_time' => $period['finish_time'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
