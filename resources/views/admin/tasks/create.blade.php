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

            <form action="{{ route('admin.tasks.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>

                <button type="submit" class="btn btn-success mt-3">Create Task</button>
                <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary mt-3">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
