<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Create User</h2>
    </x-slot>

    <form action="{{ route('users.store') }}" method="POST" class="max-w-md">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-bold">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border px-2 py-1 rounded" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block font-bold">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border px-2 py-1 rounded" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block font-bold">Password</label>
            <input type="password" name="password" class="w-full border px-2 py-1 rounded" required>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block font-bold">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full border px-2 py-1 rounded" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create User</button>
    </form>
</x-app-layout>
