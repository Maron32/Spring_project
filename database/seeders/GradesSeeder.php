<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            [
                'id' => 1,
                'name' => '1年生',
            ],
            [
                'id' => 2,
                'name' => '2年生',
            ],
            [
                'id' => 3,
                'name' => '3年生',
            ],
            [
                'id' => 4,
                'name' => '4年生',
            ],
            [
                'id' => 99,
                'name' => '管理者'
            ],
        ];

        foreach ($grades as $grade) {
            DB::table('grades')->insert([
                'id' => $grade['id'],
                'name' => $grade['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
