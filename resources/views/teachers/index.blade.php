@extends('layouts.app')
@section('content')
<div class="bg-white p-4 rounded-lg shadow-lg">
    <h1 class="text-xl font-bold mb-6">Teachers</h1>

    <a href="{{ route('teachers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-6 inline-block">Add Teacher</a>
    <table class="min-w-full border-collapse block md:table">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Name</th>
                <th class="border p-2">Gender</th>
                <th class="border p-2">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
            <tr class="border text-center">
                <td class="p-2"><a href="{{ route('teachers.show', $teacher->id) }}" class="text-blue-500">{{ $teacher->name }}</a></td>
                <td class="p-2">{{ $teacher->gender }}</td>
                <td class="p-2">{{ $teacher->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection