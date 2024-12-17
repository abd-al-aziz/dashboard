@include('layouts.header')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Add New Pet</h1>

    <form method="POST" action="{{ route('pets.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Pet Name</label>
            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="type" class="block text-sm font-medium">Type</label>
            <input type="text" name="type" id="type" class="w-full border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="breed" class="block text-sm font-medium">Breed</label>
            <input type="text" name="breed" id="breed" class="w-full border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="age" class="block text-sm font-medium">Age</label>
            <input type="number" name="age" id="age" class="w-full border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="special_needs" class="block text-sm font-medium">Special Needs</label>
            <textarea name="special_needs" id="special_needs" class="w-full border-gray-300 rounded-lg"></textarea>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium">Pet Image</label>
            <input type="file" name="image" id="image" class="w-full border-gray-300 rounded-lg">
        </div> 

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Add Pet</button>
    </form>
</div>
    
