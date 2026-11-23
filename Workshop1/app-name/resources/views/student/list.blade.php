<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>
<body>
    <main>
        <h1>Students</h1>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <p>
            <a href="{{ url('/student/create') }}">Create Student</a>
        </p>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>
                            <a href="{{ url('/students/' . $student->id) }}">View</a>
                            <a href="{{ url('/students/' . $student->id . '/edit') }}">Edit</a>
                            <form
                                action="{{ url('/students/' . $student->id) }}"
                                method="POST"
                                style="display:inline;"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No students found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
</body>
</html>
