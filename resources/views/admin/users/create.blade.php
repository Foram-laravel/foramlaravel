@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Create New Task</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    <form action="{{ route('users.store') }}" method="POST" class="max-w-md">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-bold">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border px-2 py-1 rounded" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block font-bold">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border px-2 py-1 rounded" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block font-bold">Password</label>
            <input type="password" name="password" class="w-full border px-2 py-1 rounded" required>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block font-bold">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full border px-2 py-1 rounded" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Create User</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">Back</a>
    </form>
    @endsection