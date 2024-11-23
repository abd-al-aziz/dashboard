      <!-- Sidebar -->
      <div id="sidebar" class="bg-white w-64 flex-shrink-0 hidden md:block shadow-lg transition-transform duration-300">
            <div class="p-6 bg-blue-600">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-paw text-white text-2xl"></i>
                    <span class="text-white text-lg font-bold">Pet Services</span>
                </div>
            </div>
            <nav class="p-4 space-y-4">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-3 py-2 bg-blue-50 rounded-lg text-blue-600">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('bookings.index') }}" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-100">
               <i class="fas fa-calendar"></i>
                 <span>Bookings</span>
                  </a>

                <a href="{{ route('pets.index') }}" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-dog"></i>
                    <span>Pets</span>
                </a>
                <a href="{{ route('rooms.index') }}" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-100">
                  <i class="fas fa-door-open"></i>
                 <span>Rooms</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-concierge-bell"></i>
                    <span>Services</span>
                </a>
                <a href="{{ route('reviews.index') }}" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-star"></i>
                    <span>Reviews</span>
                </a>
                <a href="{{ route('users.index') }}" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-users"></i>
                    <span>Customers</span>
                </a>
                <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </nav>
            <div class="absolute bottom-0 w-64 p-4 border-t border-gray-200">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-100 text-red-500">
                    <i class="fas fa-sign-out-alt"></i>
              <span>Logout</span>
         </button>
              </form>
             </div>
        </div>
