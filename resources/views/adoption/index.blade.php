@include('layouts.header')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Adoption</h1>

    <div class="flex justify-between items-center mb-6">
        <!-- Search Form -->
        <form action="{{ route('adoption.index') }}" method="GET" class="flex items-center space-x-2">
            <input 
                type="text" 
                name="search" 
                value="{{ old('search', $search ?? '') }}" 
                placeholder="Search adoption requests..." 
                class="bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 w-64"
            >
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Search
            </button>
        </form>

        <!-- Add New Request Button -->
        <a href="{{ route('adoption.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
        Add New Adoption Request
        </a>
    </div>

    <!-- Adoption Requests Table -->
    <table class="w-full table-auto bg-white rounded-lg shadow-md">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-gray-800">Name</th>
                <th class="px-4 py-2 text-gray-800">Image</th>
                <th class="px-4 py-2 text-gray-800">Breed</th>
                <th class="px-4 py-2 text-gray-800">Age</th>
                <th class="px-4 py-2 text-gray-800">Color</th>
                <th class="px-4 py-2 text-gray-800">Personality</th>
                <th class="px-4 py-2 text-gray-800">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adoptions as $adoption)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 text-gray-700">{{ $adoption->name }}</td>
                    <td class="px-4 py-2 text-gray-700">
                        <img src="{{ asset('storage/' . $adoption->image) }}" alt="{{ $adoption->name }}" class="h-12 w-12 object-cover rounded-full">
                    </td>
                    <td class="px-4 py-2 text-gray-700">{{ $adoption->breed }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $adoption->age }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $adoption->color }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $adoption->personality }}</td>
                    <td class="px-4 py-2 flex space-x-2">
                        <!-- Edit Button -->
                        <a href="{{ route('adoption.edit', $adoption->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded-md hover:bg-yellow-600 transition">Edit</a>

                        <!-- Delete Button -->
                        <form method="POST" action="{{ route('adoption.destroy', $adoption->id) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600 transition" onclick="return confirm('Are you sure you want to delete this request?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- No Results Message -->
    @if($adoptions->isEmpty())
        <p class="text-gray-500 mt-4">No adoption requests found.</p>
    @endif

    <!-- Pagination -->
    <div class="mt-4">
        {{ $adoptions->links() }}
    </div>
</div>
