@php
    $course = $course ?? new \App\Models\Course();
@endphp

<x-form-input name="code" label="Code" :value="$course->code" />
<x-form-input name="title" label="Title" :value="$course->title" />
<x-form-input name="credits" label="Credits" type="number" min="1" :value="$course->credits" />
<x-form-textarea name="description" label="Description" :value="$course->description" />
