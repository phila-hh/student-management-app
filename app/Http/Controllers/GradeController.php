<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::where('user_id', auth()->id())->with('course')->get();

        return view('courses.grades', compact('grades'));
    }

    public function gradeStudent(Request $request, $gradeId)
    {
        $request->validate([
            'grade' => 'required|numeric|min:0|max:100',
        ]);

        $grade = Grade::findOrFail($gradeId);
        $grade->grade = $request->input('grade');
        $grade->save();

        return redirect()->route('teacher.courses')->with('success', 'Grade updated successfully!');
    }

}


