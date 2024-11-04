<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Courses - Student Registration App</title>
    <link rel="stylesheet" href="{{ asset('css/available_courses.css') }}">
</head>
<body>

    <header class="header">
        <h1>Available Courses</h1>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary logout">Back to Dashboard</a>
    </header>

    <div class="container">
        <h2>Explore New Courses</h2>
        <ul class="course-list">
            @foreach ($availableCourses as $course)
                <li>
                    {{ $course->name }}
                    <a href="{{ route('courses.register', ['course' => $course->id]) }}" class="btn">Register for this Course</a>
                </li>
            @endforeach
        </ul>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


</body>
</html>
