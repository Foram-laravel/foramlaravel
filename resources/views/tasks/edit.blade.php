<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Task</h2>
    </x-slot>

    <form method="POST" action="{{ route('tasks.update', $task) }}" class="max-w-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-bold mb-2" for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" class="border rounded w-full py-2 px-3 @error('title') border-red-500 @enderror" required>
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2" for="description">Description</label>
            <textarea name="description" id="description" class="border rounded w-full py-2 px-3 @error('description') border-red-500 @enderror">{{ old('description', $task->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update Task</button>
    </form>
</x-app-layout>
