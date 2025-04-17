<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(DaysSeeder::class);
        $this->call(GradesSeeder::class);
        $this->call(PeriodsSeeder::class);
        $this->call(DepartmentsSeeder::class);
        $this->call(AttendanceStatusSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(SubjectSeeder::class);
        // 他のシーダーがあればここに追加
        $this->call(TimetableSeeder::class);
        $this->call(EnrolledSubjectsSeeder::class);
        $this->call(AttendanceRecordsSeeder::class);
    }
}
