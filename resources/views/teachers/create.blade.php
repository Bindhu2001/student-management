@extends('layouts.app')
@section('content')
<div class="bg-white p-4 rounded-lg shadow-lg">
    <h1 class="text-xl font-bold mb-4">Add Teacher</h1>
    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" class="border p-2 rounded w-full mb-2">
        <select name="gender" class="border p-2 rounded w-full mb-2">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        <input type="email" name="email" placeholder="Email" class="border p-2 rounded w-full mb-2">
        <button type="submit" class="bg-blue-500 text-white p-2 rounded w-full">Add Teacher</button>
    </form>
</div>
@endsection