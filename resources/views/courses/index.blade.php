<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Courses - Student Registration App</title>
    <link rel="stylesheet" href="{{ asset('css/courses.css') }}">
</head>
<body>

    <header class="header">
        <h1>Your Courses</h1>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary logout">Back to Dashboard</a>
    </header>

    <div class="container">
        <p>You are currently enrolled in the following courses:</p>
        <ul class="course-list">
            @foreach ($courses as $course)
                <li>{{ $course->name }}</li>
            @endforeach
        </ul>
    </div>

</body>
</html>
