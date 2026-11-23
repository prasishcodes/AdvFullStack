<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <main>
        <h1>Edit Student</h1>

        @if($errors->any())
            <div style="color: red; border: 1px solid red; padding: 1rem; margin-bottom: 1rem;">
                <h3>Please fix the following errors:</h3>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/students/' . $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 1rem;">
                <label for="name">Name</label><br>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $student->name) }}"
                    required
                >
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="email">Email</label><br>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $student->email) }}"
                    required
                >
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="phone">Phone</label><br>
                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    value="{{ old('phone', $student->phone) }}"
                    required
                >
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="address">Address</label><br>
                <textarea
                    id="address"
                    name="address"
                    rows="3"
                >{{ old('address', $student->address) }}</textarea>
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="date_of_birth">Date of Birth</label><br>
                <input
                    type="date"
                    id="date_of_birth"
                    name="date_of_birth"
                    value="{{ old('date_of_birth', $student->date_of_birth) }}"
                >
            </div>

            <button type="submit">Update Student</button>
        </form>

        <p style="margin-top: 1.5rem;">
            <a href="{{ url('/students') }}">Back to Students</a>
        </p>
    </main>
</body>
</html>
