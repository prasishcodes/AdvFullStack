<x-layouts.app title="Courses">
    <h1>Courses</h1>
    <a href="{{ route('courses.create') }}" class="btn">Add New Course</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Title</th>
                <th>Credits</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->credits }}</td>
                    <td>
                        <a href="{{ route('courses.show', $course) }}">Detail</a>
                        <a href="{{ route('courses.edit', $course) }}">Edit</a>
                        <x-delete-form :action="route('courses.destroy', $course)" />
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No courses found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layouts.app>
