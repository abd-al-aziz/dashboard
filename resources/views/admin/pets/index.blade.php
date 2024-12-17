@include('layouts.header')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Pets</h1>

    <div class="flex justify-between items-center mb-6">
        <!-- فورم البحث -->
        <form action="{{ route('pets.index') }}" method="GET" class="flex items-center space-x-2">
            <input 
                type="text" 
                name="search" 
                value="{{ old('search', $search ?? '') }}" 
                placeholder="Search pets..." 
                class="bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 w-64"
            >
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Search
            </button>
        </form>

        <!-- زر إضافة حيوان جديد -->
        <a href="{{ route('pets.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Add New Pet
        </a>
    </div>

    <!-- جدول الحيوانات -->
    <table class="w-full table-auto bg-white rounded-lg shadow-md">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-gray-800">Pet Name</th>
                <th class="px-4 py-2 text-gray-800">Image</th>
                <th class="px-4 py-2 text-gray-800">Type</th>
                <th class="px-4 py-2 text-gray-800">Breed</th>
                <th class="px-4 py-2 text-gray-800">Age</th>
                <th class="px-4 py-2 text-gray-800">Special Needs</th>
                <th class="px-4 py-2 text-gray-800">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pets as $pet)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 text-gray-700">{{ $pet->name }}</td>
                    <td class="px-4 py-2 text-gray-700">
                        <img src="{{ asset('storage/' . $pet->image) }}" alt="Pet Image" class="w-16 h-16 rounded-md">
                    </td>
                    <td class="px-4 py-2 text-gray-700">{{ $pet->type }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $pet->breed }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $pet->age }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $pet->special_needs }}</td>
                    <td class="px-4 py-2">
                        <!-- Edit button -->
                        <a href="{{ route('pets.edit', $pet->id) }}" class="bg-yellow-500 text-white px-2 py-1 me-4 rounded-md hover:bg-yellow-600 transition"><i class="bi bi-pencil-square"></i></a>

                        <!-- Delete button -->
                        <form method="POST" action="{{ route('pets.destroy', $pet->id) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600 transition" onclick="return confirm('Are you sure you want to delete this pet?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- التصفح عبر الصفحات -->
    <div class="mt-4">
        {{ $pets->links() }}
    </div>
</div>
