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
            // enrolled = 1 JavaBasic
            [
                'enrolled_subject_id' => 1,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-01',
            ],
            [
                'enrolled_subject_id' => 1,
                'attendance_status_id' => 2,
                'reason' => null,
                'date' => '2025-04-04',
            ],
            [
                'enrolled_subject_id' => 1,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-07',
            ],
            [
                'enrolled_subject_id' => 1,
                'attendance_status_id' => 2,
                'reason' => null,
                'date' => '2025-04-08',
            ],
            [
                'enrolled_subject_id' => 1,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-11',
            ],
            [
                'enrolled_subject_id' => 1,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-14',
            ],
            [
                'enrolled_subject_id' => 1,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-15',
            ],
            // enrolled = 2 PythonBasic
            [
                'enrolled_subject_id' => 2,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-01',
            ],
            [
                'enrolled_subject_id' => 2,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-02',
            ],
            [
                'enrolled_subject_id' => 2,
                'attendance_status_id' => 2,
                'reason' => null,
                'date' => '2025-04-04',
            ],
            [
                'enrolled_subject_id' => 2,
                'attendance_status_id' => 2,
                'reason' => null,
                'date' => '2025-04-08',
            ],
            [
                'enrolled_subject_id' => 2,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-09',
            ],
            [
                'enrolled_subject_id' => 2,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-11',
            ],
            [
                'enrolled_subject_id' => 2,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-15',
            ],
            [
                'enrolled_subject_id' => 2,
                'attendance_status_id' => 3,
                'reason' => null,
                'date' => '2025-04-16',
            ],
            // enrolled = 3 JavaExpart
            [
                'enrolled_subject_id' => 3,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-03',
            ],
            [
                'enrolled_subject_id' => 3,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-06',
            ],
            [
                'enrolled_subject_id' => 3,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-07',
            ],
            [
                'enrolled_subject_id' => 3,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-10',
            ],
            [
                'enrolled_subject_id' => 3,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-13',
            ],
            [
                'enrolled_subject_id' => 3,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-14',
            ],
            [
                'enrolled_subject_id' => 3,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-17',
            ],
            [
                'enrolled_subject_id' => 3,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-20',
            ],
            [
                'enrolled_subject_id' => 3,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-21',
            ],
            [
                'enrolled_subject_id' => 3,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-24',
            ],
            [
                'enrolled_subject_id' => 3,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-27',
            ],
            [
                'enrolled_subject_id' => 3,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-28',
            ],
            [
                'enrolled_subject_id' => 3,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-31',
            ],
            // enrolled = 4 testBacic
            [
                'enrolled_subject_id' => 4,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-02',
            ],
            [
                'enrolled_subject_id' => 4,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-03',
            ],
            [
                'enrolled_subject_id' => 4,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-09',
            ],
            [
                'enrolled_subject_id' => 4,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-10',
            ],
            [
                'enrolled_subject_id' => 4,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-16',
            ],
            // enrolled = 5 基本情報技術者試験
            [
                'enrolled_subject_id' => 5,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-07',
            ],
            [
                'enrolled_subject_id' => 5,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-14',
            ],
            // enrolled = 6 PythonBasic
            [
                'enrolled_subject_id' => 6,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-01',
            ],
            [
                'enrolled_subject_id' => 6,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-02',
            ],
            [
                'enrolled_subject_id' => 6,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-04',
            ],
            [
                'enrolled_subject_id' => 6,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-08',
            ],
            [
                'enrolled_subject_id' => 6,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-09',
            ],
            [
                'enrolled_subject_id' => 6,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-11',
            ],
            [
                'enrolled_subject_id' => 6,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-15',
            ],
            [
                'enrolled_subject_id' => 6,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-16',
            ],
            // enrolled = 7 PythonExpart
            [
                'enrolled_subject_id' => 7,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-03',
            ],
            [
                'enrolled_subject_id' => 7,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-06',
            ],
            [
                'enrolled_subject_id' => 7,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-07',
            ],
            [
                'enrolled_subject_id' => 7,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-10',
            ],
            [
                'enrolled_subject_id' => 7,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-13',
            ],
            [
                'enrolled_subject_id' => 7,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-14',
            ],
            [
                'enrolled_subject_id' => 7,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-17',
            ],
            [
                'enrolled_subject_id' => 7,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-20',
            ],
            [
                'enrolled_subject_id' => 7,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-21',
            ],
            [
                'enrolled_subject_id' => 7,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-24',
            ],
            [
                'enrolled_subject_id' => 7,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-27',
            ],
            [
                'enrolled_subject_id' => 7,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-28',
            ],
            [
                'enrolled_subject_id' => 7,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-31',
            ],
            // enrolled = 8 textExpart
            [
                'enrolled_subject_id' => 8,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-01',
            ],
            [
                'enrolled_subject_id' => 8,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-02',
            ],
            [
                'enrolled_subject_id' => 8,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-08',
            ],
            [
                'enrolled_subject_id' => 8,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-09',
            ],
            [
                'enrolled_subject_id' => 8,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-15',
            ],
            [
                'enrolled_subject_id' => 8,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-16',
            ],
            [
                'enrolled_subject_id' => 8,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-22',
            ],
            [
                'enrolled_subject_id' => 8,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-23',
            ],
            [
                'enrolled_subject_id' => 8,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-29',
            ],
            [
                'enrolled_subject_id' => 8,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-10-30',
            ],
            // enrolled = 9
            [
                'enrolled_subject_id' => 9,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-07',
            ],
            [
                'enrolled_subject_id' => 9,
                'attendance_status_id' => 1,
                'reason' => null,
                'date' => '2025-04-14',
            ],
        ];

        DB::table('attendance_records')->insert($records);
    }
}
