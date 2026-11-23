<?php

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

Route::get('/student/create', function () {
    $courses = Course::all();

    return view('student.create', [
        'courses' => $courses,
    ]);
});

Route::post('/student', function (Request $request) {
    $validated = $request->validate([
        'name'          => 'required|string|max:255',
        'email'         => 'required|email|max:255|unique:students,email',
        'phone'         => 'required|string|max:20',
        'course_id'     => 'required|exists:courses,id',
        'address'       => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student = Student::create($validated);

    return redirect()->route('students.index')
        ->with('success', "Student {$student->name} created successfully!");
});

Route::get('/students', function () {
    $students = Student::with('course')->get();

    return view('student.list', [
        'students' => $students,
    ]);
})->name('students.index');

Route::get('/students/{id}', function ($id) {
    $student = Student::with('course')->findOrFail($id);

    return view('student.detail', [
        'student' => $student,
    ]);
});

Route::get('/students/{id}/edit', function ($id) {
    $student = Student::findOrFail($id);
    $courses = Course::all();

    return view('student.edit', [
        'student' => $student,
        'courses' => $courses,
    ]);
});

Route::put('/students/{id}', function (Request $request, $id) {
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name'          => 'required|string|max:255',
        'email'         => [
            'required',
            'email',
            'max:255',
            Rule::unique('students')->ignore($student->id),
        ],
        'phone'         => 'required|string|max:20',
        'course_id'     => 'required|exists:courses,id',
        'address'       => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($validated);

    return redirect('/students/' . $student->id)
        ->with('success', 'Student updated successfully!');
});

Route::delete('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect('/students')
        ->with('success', 'Student deleted successfully!');
});
