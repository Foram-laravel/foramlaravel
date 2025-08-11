@extends('admin.layouts.app')

@section('content')
<h1>User Details</h1>

<p><strong>Name:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>

 
<a href="{{ route('admin.users.index') }}">Back to User List</a>
@endsection
