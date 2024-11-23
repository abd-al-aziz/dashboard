@include('layouts.header')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">All Bookings</h1>
    
    <div class="flex justify-between items-center mb-4">
        <!-- فورم البحث -->
        <form action="{{ route('bookings.index') }}" method="GET" class="flex items-center space-x-2">
            <input 
                type="text" 
                name="search" 
                value="{{ old('search', $search ?? '') }}" 
                placeholder="Search bookings..." 
                class="bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 w-64"
            >
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Search
            </button>
        </form>

        <!-- زر إضافة حجز جديد -->
        <a href="{{ route('bookings.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Add New Booking
        </a>
    </div>

    <!-- عرض الرسائل الناجحة -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- جدول الحجوزات -->
    <table class="w-full table-auto bg-white rounded-lg shadow-md" id="bookings-table">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-gray-800">User</th>
                <th class="px-4 py-2 text-gray-800">Pet</th>
                <th class="px-4 py-2 text-gray-800">Room</th>
                <th class="px-4 py-2 text-gray-800">Start Date</th>
                <th class="px-4 py-2 text-gray-800">End Date</th>
                <th class="px-4 py-2 text-gray-800">Status</th>
                <th class="px-4 py-2 text-gray-800">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 text-gray-700">{{ optional($booking->user)->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $booking->pet ? $booking->pet->name : 'No Pet Assigned' }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $booking->room->name }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $booking->start_date }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ $booking->end_date }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ ucfirst($booking->status) }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form method="POST" action="{{ route('bookings.destroy', $booking->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-4 py-2 text-gray-700 text-center">No bookings found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $bookings->links() }}
    </div>
</div>
