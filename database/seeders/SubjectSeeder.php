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
                'total_lectures' => 13,
                'completed_lectures' => 7,
                'is_deleted' => 0,
                'term' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Python基礎',
                'teacher_id' => 3,
                'total_lectures' => 14,
                'completed_lectures' => 8,
                'is_deleted' => 0,
                'term' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Java応用A',
                'teacher_id' => 4,
                'total_lectures' => 13,
                'completed_lectures' => 13,
                'is_deleted' => 0,
                'term' => 2,
            ],
            [
                'id' => 4,
                'name' => 'Python応用',
                'teacher_id' => 4,
                'total_lectures' => 13,
                'completed_lectures' => 13,
                'is_deleted' => 0,
                'term' => 2,
            ],
            [
                'id' => 5,
                'name' => 'テスト基礎',
                'teacher_id' => 5,
                'total_lectures' => 9,
                'completed_lectures' => 5,
                'is_deleted' => 0,
                'term' => 1,
            ],
            [
                'id' => 6,
                'name' => 'テスト応用',
                'teacher_id' => 5,
                'total_lectures' => 10,
                'completed_lectures' => 10,
                'is_deleted' => 0,
                'term' => 2,
            ],
            [
                'id' => 7,
                'name' => '基本情報技術者試験午前対策',
                'teacher_id' => 4,
                'total_lectures' => 4,
                'completed_lectures' => 2,
                'is_deleted' => 0,
                'term' => 2,
            ],
        ];

        DB::table('subjects')->insert($subjects);
    }
}
