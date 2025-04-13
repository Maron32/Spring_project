<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Userデータの定義
        $users = [
            // 生徒
            [
                'name' => '鈴木太郎',
                'department_id' => 1,
                'grade_id' => 1,
                'email'  => 'suzuki@morijyobi.ac.jp',
                // 'email_varified_at' => null,
                'password' => Hash::make('morijyobi'),
                'master' => 0,
                'delete' => 0,
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => '藤村大樹',
                'department_id' => 3,
                'grade_id' => 3,
                'email'  => 'hujimura@morijyobi.ac.jp',
                // 'email_varified_at' => null,
                'password' => Hash::make('morijyobi'),
                'master' => 0,
                'delete' => 0,
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // 管理者
            [
                'name' => '山口賢治',
                'department_id' => 99,
                'grade_id' => 99,
                'email'  => 'yamaguchi@morijyobi.ac.jp',
                // 'email_varified_at' => null,
                'password' => Hash::make('morijyobi'),
                'master' => 1,
                'delete' => 0,
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => '原田又三郎',
                'department_id' => 99,
                'grade_id' => 99,
                'email'  => 'harada@morijyobi.ac.jp',
                // 'email_varified_at' => null,
                'password' => Hash::make('morijyobi'),
                'master' => 1,
                'delete' => 0,
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
