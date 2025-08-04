<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">User Details</h2>
    </x-slot>

    <div class="bg-white shadow rounded p-4 max-w-md">
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Created at:</strong> {{ $user->created_at->format('d M Y') }}</p>

        <a href="{{ route('users.index') }}" class="text-blue-500 mt-4 inline-block">Back to Users</a>
    </div>
</x-app-layout>
