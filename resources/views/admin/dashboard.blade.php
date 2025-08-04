@extends('admin.layout')

@section('content')
    <div class="content-header">
        <h1>Dashboard</h1>
    </div>
    <p>Welcome back, {{ auth()->user()->name }}!</p>
@endsection
