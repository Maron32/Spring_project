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
            ['name' => '1年生'],
            ['name' => '2年生'],
            ['name' => '3年生'],
            ['name' => '4年生'],
        ];

        foreach ($grades as $grade) {
            DB::table('grades')->insert([
                'name' => $grade['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
