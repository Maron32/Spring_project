<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [
            ['name' => '月曜日'],
            ['name' => '火曜日'],
            ['name' => '水曜日'],
            ['name' => '木曜日'],
            ['name' => '金曜日'],
        ];

        foreach ($days as $day) {
            DB::table('days')->insert([
                'name' => $day['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
