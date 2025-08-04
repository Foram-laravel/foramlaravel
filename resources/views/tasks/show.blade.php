<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Task Details</h2>
    </x-slot>

    <div class="max-w-md bg-white shadow-md rounded p-6">
        <h3 class="text-lg font-bold mb-2">{{ $task->title }}</h3>
        <p class="mb-4">{{ $task->description ?? 'No description' }}</p>
        <a href="{{ route('tasks.index') }}" class="text-blue-600 hover:underline">Back to Tasks</a>
    </div>
</x-app-layout>
