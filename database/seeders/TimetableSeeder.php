<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //　時間割テーブル
        $timetables = [
            [
                'subject_id' => 1,
                'day_id' => 1,
                'period_id' => 3,
            ],
            [
                'subject_id' => 1,
                'day_id' => 2,
                'period_id' => 3,
            ],
            [
                'subject_id' => 1,
                'day_id' => 5,
                'period_id' => 3,
            ],
            [
                'subject_id' => 2,
                'day_id' => 2,
                'period_id' => 1,
            ],
            [
                'subject_id' => 2,
                'day_id' => 3,
                'period_id' => 3,
            ],
            [
                'subject_id' => 2,
                'day_id' => 5,
                'period_id' => 2,
            ],
            [
                'subject_id' => 3,
                'day_id' => 1,
                'period_id' => 3,
            ],
            [
                'subject_id' => 3,
                'day_id' => 2,
                'period_id' => 3,
            ],
            [
                'subject_id' => 3,
                'day_id' => 5,
                'period_id' => 3,
            ],
            [
                'subject_id' => 4,
                'day_id' => 2,
                'period_id' => 1,
            ],
            [
                'subject_id' => 4,
                'day_id' => 3,
                'period_id' => 3,
            ],
            [
                'subject_id' => 4,
                'day_id' => 5,
                'period_id' => 2,
            ],
            [
                'subject_id' => 5,
                'day_id' => 3,
                'period_id' => 1,
            ],
            [
                'subject_id' => 5,
                'day_id' => 4,
                'period_id' => 2,
            ],
            [
                'subject_id' => 6,
                'day_id' => 3,
                'period_id' => 1,
            ],
            [
                'subject_id' => 6,
                'day_id' => 4,
                'period_id' => 2,
            ],
            [
                'subject_id' => 7,
                'day_id' => 1,
                'period_id' => 4,
            ],
        ];

        DB::table('timetables')->insert($timetables);
    }
}
