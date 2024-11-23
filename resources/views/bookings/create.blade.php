@include('layouts.header')


<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Add Booking</h1>

    <form method="POST" action="{{ route('bookings.store') }}">
        @csrf
        <div class="mb-4">
            <label for="pet_id" class="block text-sm font-medium">Select Pet</label>
            <select name="pet_id" id="pet_id" class="w-full border-gray-300 rounded-lg">
                @foreach($pets as $pet)
                    <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="room_id" class="block text-sm font-medium">Select Room</label>
            <select name="room_id" id="room_id" class="w-full border-gray-300 rounded-lg">
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="w-full border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-sm font-medium">End Date</label>
            <input type="date" name="end_date" id="end_date" class="w-full border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="total_price" class="block text-sm font-medium">Total Price</label>
            <input type="number" name="total_price" id="total_price" class="w-full border-gray-300 rounded-lg">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Add Booking</button>
    </form>
</div>

