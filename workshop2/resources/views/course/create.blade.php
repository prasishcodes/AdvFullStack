<x-layouts.app title="Add New Course">
    <h1>Add New Course</h1>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        @include('course._form')
        <button type="submit" class="btn">Save Course</button>
        <a href="{{ route('courses.index') }}">Back</a>
    </form>
</x-layouts.app>
