<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTeacherEmail = 'www@gmail.com';
        $userStudentEmail = 'nasgor@gmail.com';

        //user teacher
        User::updateOrCreate(
            ['email' => $userTeacherEmail],
            [
                'name' => 'maru',
                'password' => bcrypt('pass'),
                'role' => 'teacher'
            ],
        );

        //user student
        User::updateOrCreate(
            ['email' => $userStudentEmail],
            [
                'name' => 'maru',
                'password' => bcrypt('pass'),
                'role' => 'student'
            ],
        );
    }
}
