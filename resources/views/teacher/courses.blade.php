<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses - Teacher Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header class="header">
        <h1>My Courses</h1>
        <a href="{{ route('logout') }}" class="btn btn-secondary logout">Logout</a>
    </header>

    <div class="container">
        <h2>Courses Taught by You</h2>
        <ul class="course-list">
            @foreach ($courses as $course)
                <li>
                    {{ $course->name }}
                    <a href="{{ route('teacher.grades', $course->id) }}" class="btn">View Grades</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
