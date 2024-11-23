@include('layouts.header')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Add Review</h1>
    
    <form action="{{ route('reviews.store') }}" method="POST" class="space-y-4">
        @csrf
        
        <!-- اختيار الحجز -->
        <div>
            <label for="booking_id" class="block text-sm font-medium text-gray-700">Booking</label>
            <select name="booking_id" id="booking_id" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                @foreach($bookings as $booking)
                    <option value="{{ $booking->id }}">Booking #{{ $booking->id }}</option>
                @endforeach
            </select>
        </div>
        
        <!-- تقييم -->
        <div>
            <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
            <input type="number" name="rating" id="rating" min="1" max="5" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
        </div>
        
        <!-- تعليق -->
        <div>
            <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
            <textarea name="comment" id="comment" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm"></textarea>
        </div>
        
        <!-- زر الإرسال -->
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
        </div>
    </form>
</div>

