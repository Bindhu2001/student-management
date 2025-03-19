@extends('layouts.app')
@section('content')

<div class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto">
    <h2 class="text-xl font-bold mb-4">Edit Student</h2>

    <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label class="block">Name:</label>
        <input type="text" name="name" value="{{ $student->name }}" class="border p-2 w-full rounded">

        <label class="block mt-4">Age:</label>
        <input type="number" name="age" value="{{ $student->age }}" class="border p-2 w-full rounded">

        <label class="block mt-4">Gender:</label>
        <select name="gender" class="border p-2 w-full rounded">
            <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
        </select>

        <label class="block mt-4">Address:</label>
        <input type="text" name="address" value="{{ $student->address }}" class="border p-2 w-full rounded">

        <label class="block mt-4">Teacher:</label>
        <select name="teacher_id" class="border p-2 w-full rounded">
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ $student->teacher_id == $teacher->id ? 'selected' : '' }}>
                    {{ $teacher->name }}
                </option>
            @endforeach
        </select>

        <label class="block mt-4">Photo:</label>
        <input type="file" name="photo" class="border p-2 w-full rounded">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Update</button>
    </form>
</div>

@endsection
