<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\Grade;

class MockDataSeeder extends Seeder
{
    public function run()
    {
        // Create mock users
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'),
            'role' => 'teacher',
        ]);

        // Create mock courses
        Course::create(['name' => 'Math 101', 'teacher_id' => 2]);
        Course::create(['name' => 'History 101', 'teacher_id' => 2]);

        // Create mock grades
        Grade::create(['user_id' => 1, 'course_id' => 1, 'grade' => 'A']);
        Grade::create(['user_id' => 1, 'course_id' => 2, 'grade' => 'B']);
    }
}
