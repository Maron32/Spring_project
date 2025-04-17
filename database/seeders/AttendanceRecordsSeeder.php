<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 出席履歴テーブル
        $records = [
            [
                'enrolled_subject_id' => 1,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2024-04-22',
            ],
            [
                'enrolled_subject_id' => 2,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2024-04-22',
            ],
            [
                'enrolled_subject_id' => 4,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2024-04-22',
            ],
            [
                'enrolled_subject_id' => 2,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2024-04-23',
            ],
            [
                'enrolled_subject_id' => 4,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2024-04-23',
            ],
            [
                'enrolled_subject_id' => 1,
                'attendance_status_id' => 4,
                'reason' => '腹痛',
                'date' => '2024-04-24',
            ],
            [
                'enrolled_subject_id' => 2,
                'attendance_status_id' => 3,
                'reason' => null,
                'date' => '2024-04-25',
            ],
            [
                'enrolled_subject_id' => 4,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2024-04-25',
            ],
            [
                'enrolled_subject_id' => 1,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2024-04-26',
            ],
            [
                'enrolled_subject_id' => 2,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2024-04-26',
            ],
            [
                'enrolled_subject_id' => 4,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2024-04-26',
            ],
            [
                'enrolled_subject_id' => 3,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2024-10-01',
            ],
            [
                'enrolled_subject_id' => 5,
                'attendance_status_id' => 2,
                'reason' => null,
                'date' => '2024-10-01',
            ],
            [
                'enrolled_subject_id' => 3,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2024-10-02',
            ],
            [
                'enrolled_subject_id' => 5,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2024-10-02',
            ],
            [
                'enrolled_subject_id' => 3,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2024-10-04',
            ],
            [
                'enrolled_subject_id' => 5,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2024-10-04',
            ]
        ];

        DB::table('attendance_records')->insert($records);
    }
}
