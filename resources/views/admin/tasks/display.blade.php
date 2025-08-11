@extends('admin.layouts.app')
@section('content')
<div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4">{{ $task->title }}</h1>
    <p class="text-gray-700 mb-6">{{ $task->description }}</p>

    <a href="{{ route('admin.tasks.index') }}" 
       class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
       Back
    </a>
</div>
      
@endsection
