@include('layouts.header')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Edit Pet</h1>
    <form method="POST" action="{{ route('pets.update', $pet->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Pet Name</label>
            <input type="text" name="name" id="name" value="{{ $pet->name }}" class="w-full border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="type" class="block text-sm font-medium">Type</label>
            <input type="text" name="type" id="type" value="{{ $pet->type }}" class="w-full border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="breed" class="block text-sm font-medium">Breed</label>
            <input type="text" name="breed" id="breed" value="{{ $pet->breed }}" class="w-full border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="age" class="block text-sm font-medium">Age</label>
            <input type="number" name="age" id="age" value="{{ $pet->age }}" class="w-full border-gray-300 rounded-lg">
        </div>

        <div class="mb-4">
            <label for="special_needs" class="block text-sm font-medium">Special Needs</label>
            <textarea name="special_needs" id="special_needs" class="w-full border-gray-300 rounded-lg">{{ $pet->special_needs }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update Pet</button>
    </form>
</div>
