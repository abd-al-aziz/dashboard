@include('layouts.header')
<!-- Dashboard Content -->
<main class="flex-1 overflow-y-auto p-4 space-y-6">
    <!-- Summary Cards: Row 1 -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white shadow rounded-lg p-4 flex items-center space-x-4">
            <i class="fas fa-calendar text-blue-500 text-2xl"></i>
            <div>
                <h2 class="text-lg font-bold text-gray-800">Upcoming Bookings</h2>
                <p class="text-sm text-gray-500">{{ $upcomingBookings }} this week</p>
            </div>
        </div>
        <div class="bg-white shadow rounded-lg p-4 flex items-center space-x-4">
            <i class="fas fa-dog text-green-500 text-2xl"></i>
            <div>
                <h2 class="text-lg font-bold text-gray-800">Active Pets</h2>
                <p class="text-sm text-gray-500">{{ $activePets }} registered</p>
            </div>
        </div>
        <div class="bg-white shadow rounded-lg p-4 flex items-center space-x-4">
            <i class="fas fa-users text-blue-500 text-2xl"></i>
            <div>
                <h2 class="text-lg font-bold text-gray-800">Visitors Overview</h2>
                <p class="text-sm text-gray-500">{{ $monthlyVisitors }} this month</p>
            </div>
        </div>
        <div class="bg-white shadow rounded-lg p-4 flex items-center space-x-4">
            <i class="fas fa-door-open text-purple-500 text-2xl"></i>
            <div>
                <h2 class="text-lg font-bold text-gray-800">Rooms Booked</h2>
                <p class="text-sm text-gray-500">{{ $occupiedRooms }} occupied</p>
            </div>
        </div>
    </div>

    <!-- Summary Cards: Row 2 -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white shadow rounded-lg p-4 flex items-center space-x-4">
            <i class="fas fa-hands-helping text-yellow-500 text-2xl"></i>
            <div>
                <h2 class="text-lg font-bold text-gray-800">Completed Services</h2>
                <p class="text-sm text-gray-500">{{ $completedServices }} this week</p>
            </div>
        </div>
        <div class="bg-white shadow rounded-lg p-4 flex items-center space-x-4">
            <i class="fas fa-money-bill-wave text-green-500 text-2xl"></i>
            <div>
                <h2 class="text-lg font-bold text-gray-800">Total Earnings</h2>
                <p class="text-sm text-gray-500">${{ number_format($monthlyEarnings, 2) }} this month</p>
            </div>
        </div>
        <div class="bg-white shadow rounded-lg p-4 flex items-center space-x-4">
            <i class="fas fa-envelope text-blue-500 text-2xl"></i>
            <div>
                
                
            </div>
        </div>
        <div class="bg-white shadow rounded-lg p-4 flex items-center space-x-4">
            <i class="fas fa-chart-line text-red-500 text-2xl"></i>
            <div>
                <h2 class="text-lg font-bold text-gray-800">Monthly Growth</h2>
                <p class="text-sm text-gray-500">{{ number_format($monthlyGrowth, 1) }}%</p>
            </div>
        </div>
    </div>

    <!-- Recent Bookings -->
    <div class="bg-white shadow rounded-lg p-4 mt-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-gray-800">Recent Bookings</h2>
            <div class="flex space-x-2">
            <form id="filter-form" method="GET" action="{{ route('bookings.index') }}">
            <select name="status" class="bg-gray-100 border border-gray-300 rounded-lg px-3 py-2" id="booking-status-filter" onchange="document.getElementById('filter-form').submit()">                    
            <option value="all" {{ request('status') === 'all' ? 'selected' : '' }}>All Status</option>
            <option value="confirmed" {{ request('status') === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                </form>
                <button class="bg-gray-100 px-3 py-2 rounded-lg">
                    <i class="fas fa-filter"></i>
                </button>
            </div>
        </div>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="text-left px-4 py-2 text-gray-500">Pet</th>
                    <th class="text-left px-4 py-2 text-gray-500">Owner</th>
                    <th class="text-left px-4 py-2 text-gray-500">Date</th>
                    <th class="text-left px-4 py-2 text-gray-500">Status</th>
                    <th class="text-left px-4 py-2 text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentBookings as $booking)
                <tr>
                    <td class="px-4 py-2 text-gray-800">{{ $booking->pet->name }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $booking->user->name }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $booking->start_date }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 bg-{{ $booking->status_color }}-100 text-{{ $booking->status_color }}-600 rounded-lg text-sm">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-2">
                        <a href="" class="text-blue-500 hover:underline">Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
