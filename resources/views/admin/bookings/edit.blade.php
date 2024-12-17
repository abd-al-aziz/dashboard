@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Booking</h1>

    <form method="POST" action="{{ route('bookings.update', $booking->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="pet_id" class="block text-sm font-medium text-gray-700">Pet</label>
            <select name="pet_id" id="pet_id" class="mt-1 block w-full">
                @foreach($pets as $pet)
                    <option value="{{ $pet->id }}" {{ $pet->id == $booking->pet_id ? 'selected' : '' }}>
                        {{ $pet->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="room_id" class="block text-sm font-medium text-gray-700">Room</label>
            <select name="room_id" id="room_id" class="mt-1 block w-full">
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}" {{ $room->id == $booking->room_id ? 'selected' : '' }}>
                        {{ $room->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="date" name="start_date" id="start_date" value="{{ $booking->start_date }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
            <input type="date" name="end_date" id="end_date" value="{{ $booking->end_date }}" class="mt-1 block w-full">
        </div>

        <div class="mb-4">
            <label for="total_price" class="block text-sm font-medium text-gray-700">Total Price</label>
            <input type="number" name="total_price" id="total_price" value="{{ $booking->total_price }}" class="mt-1 block w-full">
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Save Changes</button>
    </form>
</div>
@endsection
