@include('layouts.header')

<div class="container mx-auto my-5 px-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-semibold">Users</h1>

        <!-- Search Form -->
        <form action="{{ route('users.index') }}" method="GET" class="flex space-x-2">
            <input type="text" name="search" class="form-input px-4 py-2 border border-gray-300 rounded-md" placeholder="Search users" value="{{ request('search') }}">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">Search</button>
        </form>

        <!-- <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition flex items-center">
            <i class="bi bi-plus-circle"></i> Add User
        </a> -->
    </div>

    @if($users->isEmpty())
        <div class="bg-blue-100 text-blue-800 p-4 rounded-md">
            No users found. Click "Add User" to create a new user.
        </div>
    @else
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto bg-white rounded-lg shadow-md">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-gray-800 text-left">Id</th>
                        <th class="px-4 py-2 text-gray-800 text-left">Name</th>
                        <th class="px-4 py-2 text-gray-800 text-left">Email</th>
                        <th class="px-4 py-2 text-gray-800 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2 text-gray-700">{{ $user->id }}</td>
                            <td class="px-4 py-2 text-gray-700">{{ $user->name }}</td>
                            <td class="px-4 py-2 text-gray-700">{{ $user->email }}</td>
                            <td class="px-4 py-2 text-gray-700 text-center">
                               
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600 transition">
                                        <i class="bi bi-trash"></i> 
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 flex justify-center">
        </div>
    @endif
</div>
