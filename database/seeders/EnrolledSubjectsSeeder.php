<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrolledSubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 履修科目テーブル
        $enrolled_subjects = [
            // student_id = 1
            [
                'id' => 1,
                'subject_id' => 1,
                'student_id' => 1,
            ],
            [
                'id' => 2,
                'subject_id' => 2,
                'student_id' => 1,
            ],
            [
                'id' => 3,
                'subject_id' => 3,
                'student_id' => 1,
            ],
            [
                'id' => 4,
                'subject_id' => 5,
                'student_id' => 1,
            ],
            [
                'id' => 5,
                'subject_id' => 7,
                'student_id' => 1,
            ],
            // student_id = 2
            [
                'id' => 6,
                'subject_id' => 2,
                'student_id' => 2,
            ],
            [
                'id' => 7,
                'subject_id' => 4,
                'student_id' => 2,
            ],
            [
                'id' => 8,
                'subject_id' => 6,
                'student_id' => 2,
            ],
            [
                'id' => 9,
                'subject_id' => 7,
                'student_id' => 2,
            ],
        ];

        DB::table('enrolled_subjects')->insert($enrolled_subjects);
    }
}
