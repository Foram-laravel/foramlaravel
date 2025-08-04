<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Users</h2>
    </x-slot>

    <div class="mb-4">
        <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create New User</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 p-2 text-green-700 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Email</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="p-2 border">{{ $user->name }}</td>
                <td class="p-2 border">{{ $user->email }}</td>
                <td class="p-2 border">
                    <a href="{{ route('users.show', $user) }}" class="text-blue-500">View</a> |
                    <a href="{{ route('users.edit', $user) }}" class="text-yellow-500">Edit</a> |
                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Delete user?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
