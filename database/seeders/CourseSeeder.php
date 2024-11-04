<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        Course::create(['name' => 'Mathematics', 'description' => 'Basic Math Course']);
        Course::create(['name' => 'Science', 'description' => 'Introductory Science Course']);
        Course::create(['name' => 'History', 'description' => 'World History Overview']);
    }
}

