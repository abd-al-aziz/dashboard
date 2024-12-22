<!-- resources/views/adoption/create.blade.php -->

@include('layouts.header')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Add New Adoption Request</h1>

    <form action="{{ route('adoption.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('name') }}" required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Breed -->
        <div class="mb-4">
            <label for="breed" class="block text-sm font-medium text-gray-700">Breed</label>
            <input type="text" id="breed" name="breed" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('breed') }}" required>
            @error('breed')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Age -->
        <div class="mb-4">
            <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
            <input type="number" id="age" name="age" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('age') }}" required>
            @error('age')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Color -->
        <div class="mb-4">
            <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
            <input type="text" id="color" name="color" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('color') }}" required>
            @error('color')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Personality -->
        <div class="mb-4">
            <label for="personality" class="block text-sm font-medium text-gray-700">Personality</label>
            <textarea id="personality" name="personality" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ old('personality') }}</textarea>
            @error('personality')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Image -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('image')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Submit Request
            </button>
        </div>
    </form>
</div>

