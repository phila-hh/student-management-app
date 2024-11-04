<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Student Registration App</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

    <header class="header">
        <h1>Welcome to Your Dashboard</h1>
        <form action="/logout" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-secondary logout">Logout</button>
        </form>
    </header>

    <div class="container">
        <div class="card">
            <h2>Your Courses</h2>
            <a href="{{ route('courses.index') }}" class="btn">View Courses</a>
        </div>
        <div class="card">
            <h2>Grade Report</h2>
            <a href="{{ route('grades.index') }}" class="btn">View Grade Report</a>
        </div>
        <div class="card">
            <h2>Available Courses</h2>
            <a href="{{ route('courses.available') }}" class="btn">View Available Courses</a>
        </div>
    </div>

</body>
</html>
