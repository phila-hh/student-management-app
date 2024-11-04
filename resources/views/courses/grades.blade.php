<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Report - Student Registration App</title>
    <link rel="stylesheet" href="{{ asset('css/grades.css') }}">
</head>
<body>

    <header class="header">
        <h1>Grade Report</h1>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary logout">Back to Dashboard</a>
    </header>

    <div class="container">
        <h2>Your Grades</h2>
        <table class="grades-table">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grades as $grade)
                    <tr>
                        <td>{{ $grade->course->name }}</td>
                        <td>{{ $grade->grade }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
