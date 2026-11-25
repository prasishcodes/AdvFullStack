<x-layouts.app title="Course Details">
    <h1>Course Details</h1>

    <p><strong>ID:</strong> {{ $course->id }}</p>
    <p><strong>Code:</strong> {{ $course->code }}</p>
    <p><strong>Title:</strong> {{ $course->title }}</p>
    <p><strong>Credits:</strong> {{ $course->credits }}</p>
    <p><strong>Description:</strong> {{ $course->description ?? 'N/A' }}</p>

    <a href="{{ route('courses.edit', $course) }}" class="btn">Edit Course</a>
    <a href="{{ route('courses.index') }}">Back to Courses</a>
</x-layouts.app>
