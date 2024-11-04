<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\TeacherController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/signup', [AuthController::class, 'showRegistrationForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'register']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/grades', [GradeController::class, 'index'])->name('grades.index');
    Route::get('/available_courses', [CourseController::class, 'available'])->name('courses.available');
    Route::get('/register-course/{course}', [CourseController::class, 'register'])->name('courses.register');
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
});

Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/courses', [TeacherController::class, 'courses'])->name('teacher.courses');
    Route::get('/teacher/grades/{courseId}', [TeacherController::class, 'grades'])->name('teacher.grades');
    Route::post('/teacher/grades/{courseId}/{userId}', [TeacherController::class, 'updateGrade'])->name('teacher.update.grade');
    Route::delete('/teacher/grades/{courseId}/{userId}', [TeacherController::class, 'deleteGrade'])->name('teacher.delete.grade');
    Route::get('/teacher/courses/create', [CourseController::class, 'create'])->name('courses.create')->middleware('auth');
    Route::post('/teacher/courses', [CourseController::class, 'store'])->name('courses.store')->middleware('auth');

});

