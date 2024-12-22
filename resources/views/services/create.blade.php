@include('layouts.header')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Add Service</h1>

    <form method="POST" action="{{ route('service.store') }}">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Service Name</label>
            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea name="description" id="description" class="w-full border-gray-300 rounded-lg"></textarea>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium">Price</label>
            <input type="number" name="price" id="price" class="w-full border-gray-300 rounded-lg" step="0.01" required>
        </div>
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium">Status</label>
            <select name="status" id="status" class="w-full border-gray-300 rounded-lg">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Add Service</button>
    </form>
</div>
