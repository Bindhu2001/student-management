@extends('layouts.app')
@section('content')
<div class="bg-white p-4 rounded-lg shadow-lg">
    <h1 class="text-xl font-bold mb-4">Add Student</h1>
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Name" class="border p-2 rounded w-full mb-2">
        <input type="number" name="age" placeholder="Age" class="border p-2 rounded w-full mb-2">
        <textarea name="address" placeholder="Address" class="border p-2 rounded w-full mb-2"></textarea>
        <select name="gender" class="border p-2 rounded w-full mb-2">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        <input type="file" name="photo" class="border p-2 rounded w-full mb-2">
        <select name="teacher_id" class="border p-2 rounded w-full mb-2">
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded w-full">Add Student</button>
    </form>
</div>
@endsection
