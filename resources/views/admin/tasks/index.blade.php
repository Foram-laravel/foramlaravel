@extends('admin.layouts.app') {{-- This layout should wrap the admin UI --}}

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Task Management</h1>

        <div class="mb-4">
            <a href="tasks/create" class="bg-blue-500 hover:bg-blue-700  font-bold py-2 px-4 rounded">+ Create New Task</a>
        </div>
        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
         
        
        {{-- Tasks Table --}}
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Title</th>
                        <th class="border px-4 py-2">Description</th>
                        <th class="border px-4 py-2">Created At</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr>
                            <td class="border px-4 py-2">{{ $task->id }}</td>
                            <td class="border px-4 py-2">{{ $task->title }}</td>
                            <td class="border px-4 py-2">{{ Str::limit($task->description, 50) }}</td>
                            <td class="border px-4 py-2">{{ $task->created_at }}</td>
                            <td class="border px-4 py-2 space-x-2">
                             <a href="tasks/{{ $task->id }}/change" class="bg-blue-500 hover:bg-blue-700  font-bold py-2 px-4 rounded">Edit</a> 
                           
                                <a href="tasks/{{ $task->id }}/display">View</a>
                                <form action="tasks/{{ $task->id }}/remove" method="POST" onclick="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline" >Delete</button>
                                     
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">No tasks found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    </div>
    <style>
    [aria-label="&laquo; Previous"],
    [aria-label="Next &raquo;"] {
        display: none !important;
    }
</style>
@endsection
