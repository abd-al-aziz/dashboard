@include('layouts.header')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Edit Adoption Request</h1>

    <form action="{{ route('adoption.update', $adoption->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- تستخدم PUT لتحديث البيانات -->

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('name', $adoption->name) }}" required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Breed -->
        <div class="mb-4">
            <label for="breed" class="block text-sm font-medium text-gray-700">Breed</label>
            <input type="text" id="breed" name="breed" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('breed', $adoption->breed) }}" required>
            @error('breed')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Age -->
        <div class="mb-4">
            <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
            <input type="number" id="age" name="age" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('age', $adoption->age) }}" required>
            @error('age')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Color -->
        <div class="mb-4">
            <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
            <input type="text" id="color" name="color" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('color', $adoption->color) }}" required>
            @error('color')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Personality -->
        <div class="mb-4">
            <label for="personality" class="block text-sm font-medium text-gray-700">Personality</label>
            <textarea id="personality" name="personality" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ old('personality', $adoption->personality) }}</textarea>
            @error('personality')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Image (Optional) -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Image (Optional)</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('image')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            @if($adoption->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $adoption->image) }}" alt="{{ $adoption->name }}" class="h-12 w-12 object-cover rounded-full">
                </div>
            @endif
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Update Request
            </button>
        </div>
    </form>
</div>
