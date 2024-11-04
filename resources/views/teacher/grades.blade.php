<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Management - Teacher Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header class="header">
        <h1>Grade Management</h1>
        <a href="{{ route('logout') }}" class="btn btn-secondary logout">Logout</a>
    </header>

    <div class="container">
        <h2>Grades for Course: {{ $course->name }}</h2>
        <table class="grades-table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Grade</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grades as $grade)
                    <tr>
                        <td>{{ $grade->user->name }}</td>
                        <td>
                            <form action="{{ route('teacher.update.grade', [$course->id, $grade->user_id]) }}" method="POST">
                                @csrf
                                <input type="number" name="grade" value="{{ $grade->grade }}" min="0" max="100">
                                <button type="submit" class="btn">Update</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('teacher.delete.grade', [$course->id, $grade->user_id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
