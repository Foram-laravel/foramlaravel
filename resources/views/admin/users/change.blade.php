@extends('admin.layouts.app')

@section('content')
<h1>Edit User</h1>

<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
    </div>

    <div>
        <label for="password">Password (leave blank if no change):</label>
        <input type="password" name="password" id="password">
    </div>

    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
    </div>

    <button type="submit">Update User</button>
</form>
@endsection
