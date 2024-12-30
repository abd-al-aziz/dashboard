@include('layouts.header')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Edit Room</h1>
    
    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Room Name</label>
            <input type="text" name="name" value="{{ old('name', $room->name) }}" class="w-full border-gray-300 rounded-lg" required>
        </div>


        <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea name="description" class="w-full border-gray-300 rounded-lg">{{ old('description', $room->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="price_per_night" class="block text-sm font-medium">Price per Night</label>
            <input type="number" name="price_per_night" value="{{ old('price_per_night', $room->price_per_night) }}" class="w-full border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="is_available" class="block text-sm font-medium">Available</label>
            <input type="checkbox" name="is_available" value="1" {{ old('is_available', $room->is_available) ? 'checked' : '' }}>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update Room</button>
    </form>
</div>

