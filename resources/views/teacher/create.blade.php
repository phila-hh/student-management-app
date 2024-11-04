<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    <header class="header">
        <h1>Add New Course</h1>
        <a href="{{ route('logout') }}" class="btn btn-secondary logout">Logout</a>
    </header>

    <div class="container">
        <h2>Create a New Course</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('courses.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Course Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="description">Description (optional)</label>
                <textarea id="description" name="description"></textarea>
            </div>
            <div>
                <button type="submit">Add Course</button>
            </div>
        </form>
    </div>
</body>
</html>
