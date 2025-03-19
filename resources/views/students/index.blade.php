@extends('layouts.app')
@section('content')
<div class="bg-white p-4 rounded-lg shadow-lg">
    <h1 class="text-xl font-bold mb-6">Students</h1>

    <a href="{{ route('students.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-6 inline-block">Add Student</a>
    <form method="GET" action="{{ route('students.index') }}" class="mb-6 flex flex-wrap gap-2">
        <input type="text" name="search" placeholder="Search by name..." value="{{ request('search') }}" class="border p-2 rounded w-full max-w-sm">
        
        <select name="gender" class="border p-2 rounded w-full max-w-xs">
            <option value="">All Genders</option>
            <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
        </select>

        <select name="teacher_id" class="border p-2 rounded w-full max-w-xs">
            <option value="">All Teachers</option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ request('teacher_id') == $teacher->id ? 'selected' : '' }}>
                    {{ $teacher->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
        <a href="{{ route('students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Reset</a>
    </form>
    <table class="min-w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 p-2">Name</th>
                <th class="border border-gray-300 p-2">Age</th>
                <th class="border border-gray-300 p-2">Gender</th>
                <th class="border border-gray-300 p-2">Address</th>
                <th class="border border-gray-300 p-2">Photo</th>
                <th class="border border-gray-300 p-2">Teacher</th>
                <th class="border border-gray-300 p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
            <tr class="border border-gray-300 text-center">
                <td class="p-2">{{ $student->name }}</td>
                <td class="p-2">{{ $student->age }}</td>
                <td class="p-2">{{ $student->gender }}</td>
                <td class="p-2">{{ $student->address }}</td>
                <td class="p-2">
                    <img src="{{ asset('storage/' . $student->photo) }}" class="w-10 h-10 rounded">
                </td>
                <td class="p-2">{{ $student->teacher->name }}</td>
                <td class="p-2 flex justify-center gap-2">
                    <a href="{{ route('students.edit', $student->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center p-4 text-gray-600">No students found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="mt-4">
        {{ $students->links() }}
    </div>
</div>
@endsection
