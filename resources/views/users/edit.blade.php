<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit User</h2>
    </x-slot>

    <form action="{{ route('users.update', $user) }}" method="POST" class="max-w-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-bold">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border px-2 py-1 rounded" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block font-bold">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border px-2 py-1 rounded" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block font-bold">New Password (optional)</label>
            <input type="password" name="password" class="w-full border px-2 py-1 rounded">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block font-bold">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="w-full border px-2 py-1 rounded">
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update User</button>
    </form>
</x-app-layout>
