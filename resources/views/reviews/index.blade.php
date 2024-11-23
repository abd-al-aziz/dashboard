@include('layouts.header')

<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Reviews</h1>
        
        <!-- نموذج البحث -->
        <form action="{{ route('reviews.index') }}" method="GET" class="flex items-center space-x-4">
            <input 
                type="text" 
                name="search" 
                value="{{ old('search', $search) }}" 
                placeholder="Search by user, booking ID, rating, or status" 
                class="px-4 py-2 border rounded-lg" 
            />
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Search</button>
        </form>

        <!-- زر إضافة مراجعة جديدة -->
        <a href="{{ route('reviews.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add Review
        </a>
    </div>

    @if($reviews->count() > 0)
        <table class="w-full table-auto bg-white rounded-lg shadow-md">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-gray-800">User</th>
                    <th class="px-4 py-2 text-gray-800">Booking ID</th>
                    <th class="px-4 py-2 text-gray-800">Rating</th>
                    <th class="px-4 py-2 text-gray-800">Comment</th>
                    <th class="px-4 py-2 text-gray-800">Status</th>
                    <th class="px-4 py-2 text-gray-800">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $review->user->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $review->booking_id ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $review->rating }}</td>
                        <td class="px-4 py-2">{{ $review->comment }}</td>
                        <td class="px-4 py-2">{{ $review->status }}</td>
                        <td class="px-4 py-2">
                            <form 
                                action="{{ route('reviews.updateStatus', ['review' => $review->id, 'status' => 'Accept']) }}" 
                                method="POST" 
                                class="inline-block"
                            >
                                @csrf
                                @method('PUT')
                                <button type="submit" 
                                    class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">
                                    Accept
                                </button>
                            </form>

                            <form 
                                action="{{ route('reviews.updateStatus', ['review' => $review->id, 'status' => 'Reject']) }}" 
                                method="POST" 
                                class="inline-block"
                            >
                                @csrf
                                @method('PUT')
                                <button type="submit" 
                                    class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                                    Reject
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- روابط التصفح عبر الصفحات -->
        <div class="mt-4">
            {{ $reviews->links() }}
        </div>
    @else
        <p class="text-gray-700 mt-4">No reviews found.</p>
    @endif
</div>
