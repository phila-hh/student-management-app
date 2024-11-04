<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $courses = Course::where('teacher_id', auth()->id())->get();
        return view('teacher.dashboard', compact('courses'));
    }

    public function create()
    {
        return view('teacher.courses.create'); // Return the view for the course creation form
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'teacher_id' => auth()->id(),
        ]);

        return redirect()->route('teacher.courses')->with('success', 'Course created successfully!');
    }


    public function courses()
    {
        $courses = Course::where('teacher_id', Auth::id())->get();
        return view('teacher.courses', compact('courses'));
    }

    public function grades($courseId)
    {
        $course = Course::findOrFail($courseId);
        $grades = Grade::where('course_id', $courseId)->with('user')->get();
        return view('teacher.grades', compact('course', 'grades'));
    }

    public function updateGrade(Request $request, $courseId, $userId)
    {
        $request->validate([
            'grade' => 'required|numeric|min:0|max:100',
        ]);

        $grade = Grade::where('course_id', $courseId)->where('user_id', $userId)->firstOrFail();
        $grade->grade = $request->grade;
        $grade->save();

        return redirect()->route('teacher.grades', $courseId)->with('success', 'Grade updated successfully!');
    }

    public function deleteGrade($courseId, $userId)
    {
        $grade = Grade::where('course_id', $courseId)->where('user_id', $userId)->firstOrFail();
        $grade->delete();

        return redirect()->route('teacher.grades', $courseId)->with('success', 'Grade deleted successfully!');
    }
}
