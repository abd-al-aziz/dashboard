@include('layouts.header')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Add New Room</h1>

    <!-- فورم إضافة غرفة جديدة -->
    <form method="POST" action="{{ route('rooms.store') }}">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Room Name</label>
            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="type" class="block text-sm font-medium">Room Type</label>
            <input type="text" name="type" id="type" class="w-full border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea name="description" id="description" class="w-full border-gray-300 rounded-lg" rows="4"></textarea>
        </div>

        <div class="mb-4">
            <label for="price_per_night" class="block text-sm font-medium">Price Per Night</label>
            <input type="number" name="price_per_night" id="price_per_night" class="w-full border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="is_available" class="block text-sm font-medium">Available</label>
            <select name="is_available" id="is_available" class="w-full border-gray-300 rounded-lg" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Add Room</button>
    </form>
</div>
