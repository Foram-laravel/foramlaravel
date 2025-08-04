<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Tasks</h2>
    </x-slot>

    <div class="mb-4">
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create New Task</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($tasks->count())
        <table class="min-w-full bg-white shadow-md rounded mb-4">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Description</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td class="border-b py-2 px-4">{{ $task->title }}</td>
                    <td class="border-b py-2 px-4">{{ Str::limit($task->description, 50) }}</td>
                    <td class="border-b py-2 px-4">
                        <a href="{{ route('tasks.show', $task) }}" class="text-blue-600 hover:underline mr-2">View</a>
                        <a href="{{ route('tasks.edit', $task) }}" class="text-yellow-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline" onsubmit="return confirm('Delete this task?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $tasks->links() }} {{-- Pagination links --}}
    @else
        <p>No tasks found.</p>
    @endif
</x-app-layout>
