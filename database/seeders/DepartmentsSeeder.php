<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'id' => 1,
                'name' => '情報システム科'
            ],
            [
                'id' => 2,
                'name' => '総合システム工学科',
            ],
            [
                'id' => 3,
                'name' => '高度情報工学科',
            ],
            [
                'id' => 99,
                'name' => '管理者',
            ],
        ];

        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'id' => $department['id'],
                'name' => $department['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
