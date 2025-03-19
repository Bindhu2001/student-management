@extends('layouts.app')
@section('content')
<h1 class="text-xl font-bold mb-6">Teacher Details</h1>

<div class="mb-6 p-4 border rounded shadow">
    <h2 class="text-lg font-semibold">{{ $teacher->name }}</h2>
    <p><strong>Email:</strong> {{ $teacher->email }}</p>
    <p><strong>Subject:</strong> {{ $teacher->subject }}</p>
</div>

<h1 class="text-xl font-bold mb-6">Students Under {{ $teacher->name }}</h1>

@if($teacher->students->isEmpty())
    <p class="text-gray-600">No students assigned.</p>
@else
    <table class="min-w-full border-collapse border border-gray-300 text-center">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teacher->students as $student)
                <tr class="border border-gray-300">
                    <td class="border border-gray-300 px-4 py-2">{{ $student->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $student->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<a href="{{ route('teachers.index') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Back to Teachers</a>
