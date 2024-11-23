@include('layouts.header')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Rooms</h1>

    <!-- نموذج البحث -->
    <form action="{{ route('rooms.index') }}" method="GET" class="mb-4">
        <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Search for rooms..." class="px-4 py-2 border rounded-lg" />
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Search</button>
    </form>

    <!-- رسالة نجاح -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- زر إضافة غرفة جديدة -->
    <div class="mb-4">
        <a href="{{ route('rooms.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Add New Room</a>
    </div>

    <!-- جدول عرض الغرف -->
    <table class="w-full table-auto bg-white rounded-lg shadow-md">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-gray-800">Name</th>
                <th class="px-4 py-2 text-gray-800">Type</th>
                <th class="px-4 py-2 text-gray-800">Description</th>
                <th class="px-4 py-2 text-gray-800">Price per Night</th>
                <th class="px-4 py-2 text-gray-800">Available</th>
                <th class="px-4 py-2 text-gray-800">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 text-gray-700">{{ $room->name }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $room->type }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $room->description }}</td>
                    <td class="px-4 py-2 text-gray-700">${{ $room->price_per_night }}</td>
                    <td class="px-4 py-2 text-gray-700">
                        {{ $room->is_available ? 'Yes' : 'No' }}
                    </td>
                    <td class="px-4 py-2">
                        <a href="{{ route('rooms.edit', $room->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- روابط التصفح عبر الصفحات -->
    <div class="mt-4">
        {{ $rooms->links() }}
    </div>
</div>
