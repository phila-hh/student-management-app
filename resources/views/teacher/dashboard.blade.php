<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <header class="header">
        <h1>Teacher Dashboard</h1>
        <a href="{{ route('logout') }}" class="btn btn-secondary logout">Logout</a>
    </header>

    <div class="container">
        <h2>Welcome, Teacher!</h2>
        <p>You can manage your courses and grades from here.</p>
        
        <ul>
            <li><a href="{{ route('teacher.courses') }}">View My Courses</a></li>
            <li>
                <h3>Select a Course to Grade Students</h3>
                <ul>
                    @foreach ($courses as $course)
                        <li>
                            <a href="{{ route('teacher.grades', ['courseId' => $course->id]) }}">
                                Grade Students for {{ $course->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</body>
</html>
