<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function index()
    {
        return view('course.list', [
            'courses' => Course::all(),
        ]);
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        $course = Course::create($request->validate($this->rules()));

        return redirect()
            ->route('courses.index')
            ->with('success', "Course {$course->title} added successfully!");
    }

    public function show(Course $course)
    {
        return view('course.detail', [
            'course' => $course,
        ]);
    }

    public function edit(Course $course)
    {
        return view('course.edit', [
            'course' => $course,
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->validate($this->rules($course)));

        return redirect()
            ->route('courses.show', $course)
            ->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course deleted successfully!');
    }

    private function rules(?Course $course = null): array
    {
        return [
            'code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('courses', 'code')->ignore($course?->id),
            ],
            'title' => 'required|string|max:255',
            'credits' => 'required|integer|min:1|max:60',
            'description' => 'nullable|string|max:1000',
        ];
    }
}
