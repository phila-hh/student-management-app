<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    public function run()
    {
        Grade::create([
            'user_id' => 1,
            'course_id' => 1,
            'grade' => 'A',
        ]);

        Grade::create([
            'user_id' => 1,
            'course_id' => 2,
            'grade' => 'B',
        ]);

        Grade::create([
            'user_id' => 2,
            'course_id' => 1,
            'grade' => 'C',
        ]);
    }
}