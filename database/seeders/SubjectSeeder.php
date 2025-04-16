<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Subjectデータを定義
        $subjects = [
            [
                'id' => 1,
                'name' => 'Java基礎A',
                'teacher_id' => 3,
                'total_lectures' => 30,
                'is_deleted' => 0,
                'term' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Python基礎',
                'teacher_id' => 3,
                'total_lectures' => 30,
                'is_deleted' => 0,
                'term' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Java応用A',
                'teacher_id' => 4,
                'total_lectures' => 30,
                'is_deleted' => 0,
                'term' => 2,
            ],
        ];

        DB::table('subjects')->insert($subjects);
    }
}
