<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = auth()->user()->grades()->with('course')->get()->pluck('course');
        return view('courses.index', compact('courses'));
    }


    public function available()
    {
        $enrolledCourseIds = auth()->user()->grades()->pluck('course_id')->toArray();
        $availableCourses = Course::whereNotIn('id', $enrolledCourseIds)->get();
        return view('courses.available_courses', compact('availableCourses'));
    }

    public function showGrades()
    {
        $grades = Grade::where('user_id', auth()->id())->get();

        return view('courses.grades', compact('grades'));
    }

    public function register($courseId)
    {
        $course = Course::findOrFail($courseId);

        $existingRegistration = Grade::where('user_id', auth()->id())
                                      ->where('course_id', $courseId)
                                      ->first();

        if ($existingRegistration) {
            return redirect()->route('courses.index')->with('error', 'You are already registered for this course.');
        }

        Grade::create([
            'user_id' => auth()->id(),
            'course_id' => $course->id,
            'grade' => 'F',
        ]);

        return redirect()->route('courses.index')->with('success', 'Successfully registered for the course!');
    }
}

