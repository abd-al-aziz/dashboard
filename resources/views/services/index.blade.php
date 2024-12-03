@include('layouts.header')

<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Services</h1>
    <a href="{{ route('services.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg mb-4 inline-block">Add Service</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full bg-white rounded-lg shadow-md">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2">{{ $service->name }}</td>
                    <td class="px-4 py-2">{{ $service->description }}</td>
                    <td class="px-4 py-2">${{ number_format($service->price, 2) }}</td>
                    <td class="px-4 py-2">{{ $service->status ? 'Active' : 'Inactive' }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('services.edit', $service->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded-md">Edit</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center px-4 py-2">No services found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
