<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
</head>
<body>
    <main>
        <h1>Student Details</h1>

        <p>
            <strong>ID:</strong> {{ $student->id }}
        </p>

        <p>
            <strong>Name:</strong> {{ $student->name }}
        </p>

        <p>
            <strong>Email:</strong> {{ $student->email }}
        </p>

        <p>
            <strong>Phone:</strong> {{ $student->phone }}
        </p>

        <p>
            <strong>Course:</strong> {{ $student->course->name ?? 'No Course' }}
        </p>

        <p>
            <strong>Address:</strong> {{ $student->address ?? 'N/A' }}
        </p>

        <p>
            <strong>Date of Birth:</strong> {{ $student->date_of_birth ?? 'N/A' }}
        </p>

        <p style="margin-top: 1.5rem;">
            <a href="{{ url('/students/' . $student->id . '/edit') }}">Edit Student</a>
        </p>

        <p>
            <a href="{{ url('/students') }}">Back to Students</a>
        </p>
    </main>
</body>
</html>
