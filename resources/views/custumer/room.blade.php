@extends('custumer.master')

@section('Contact')
<!-- Banner Section -->
<section class="banner" style="background-color: #fff8e5; background-image:url(assets/img/banner.png)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-text">
                    <h2>Rooms</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Rooms</li>
                    </ol>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-img">
                    <div class="banner-img-1">
                        <img src="assets/img/cat-1.jpg" alt="banner">
                    </div>
                    <div class="banner-img-2">
                        <img src="assets/img/cat-0.jpg" alt="banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="assets/img/hero-shaps-1.png" alt="hero-shaps" class="img-2">
    <img src="assets/img/hero-shaps-1.png" alt="hero-shaps" class="img-4">
</section>

<!-- Rooms Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
        @foreach($rooms as $room)
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-2 border-warning shadow-sm transition-hover">
            <img src="assets/img/room-5.jpg" class="card-img-top object-fit-cover" style="height: 300px;" alt="Room">
            <div class="card-body d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0">JOD {{ number_format($room->price_per_night, 2) }}</h5>
                    @if($room->is_available)
                        <span class="badge bg-success rounded-pill px-3 py-2">Available</span>
                    @else
                        <span class="badge bg-danger rounded-pill px-3 py-2">Not Available</span>
                    @endif
                </div>
                <p class="card-text">{{ $room->description }}</p>
                <div class="mb-4">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2 small">
                            <i class="fa-solid fa-check text-success me-2"></i>{{ __('Health Care') }}
                        </li>
                        <li class="mb-2 small">
                            <i class="fa-solid fa-check text-success me-2"></i>{{ __('Space to Play') }}
                        </li>
                        <li class="mb-2 small">
                            <i class="fa-solid fa-check text-success me-2"></i>{{ __('Grooming') }}
                        </li>
                    </ul>
                </div>
                <div class="">
                    @if(auth()->check() && $room->is_available)
                        <!-- <button class="btn bg-warning w-100 rounded-pill py-2 text-white" 
                                onclick="openBookingModal('{{ $room->id }}', '{{ $room->price_per_night }}')">
                            Booking <i class="fa fa-calendar-alt"></i>
                        </button> -->
                        <a href="/checkout/{{ $room->id }}" class="btn bg-warning w-100 rounded-pill py-2 text-white">
                            Booking <i class=""></i>
                        </a>
                    @else
                        <button class="btn {{ $room->is_available ? 'btn-secondary' : 'btn-danger' }} w-100 rounded-pill py-2" 
                                {{ $room->is_available ? 'onclick=showLoginAlert()' : 'disabled' }} >
                            Booking <i class=""></i>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Select Booking Date</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('custumer.bookings.store', ':roomId') }}" method="post" id="bookingForm">
                @csrf
                <input id="bookingModal_input" type="hidden" name="room_id">
                <!-- Display Errors if any -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control rounded-3 shadow-sm" required>
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control rounded-3 shadow-sm" required>
                
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Confirm Booking</button>
            </form>
        </div>
    </div>
</div>
@endforeach
        </div>
    </div>
</section>

<!-- Booking Modal -->

@endsection

<script>
   function showLoginAlert() {
    Swal.fire({
        icon: 'warning',
        title: 'Login Required',
        text: 'Please log in to book a service.',
        showConfirmButton: true,
        confirmButtonText: 'Login',
        confirmButtonColor: '#3085d6'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "{{ route('login') }}";
        }
    });
}

function openBookingModal(roomId, price) {
    const form = document.querySelector('#bookingForm');
    const inputRoomId = document.querySelector('#bookingModal_input');
    inputRoomId.value = roomId;
    form.action = form.action.replace(':roomId', roomId);
    
    document.querySelector('#bookingModal .modal-title').textContent = `Booking Room (Price: JOD ${price})`;
    const modal = new bootstrap.Modal(document.getElementById('bookingModal'));
    modal.show();
}
</script>
