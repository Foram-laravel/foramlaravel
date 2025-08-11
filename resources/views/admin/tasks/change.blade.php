@extends('admin.layouts.app')

@section('content')
<form action="{{ route('admin.tasks.update', $task->id) }}" method="POST">
    @csrf
    {{-- Since it's an update operation, use PUT --}}
    @method('PUT')
    
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" required>
    </div>

    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ old('description', $task->description) }}</textarea>
    </div>

    <button type="submit">Update Task</button>
</form>
@endsection