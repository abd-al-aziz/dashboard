@extends('custumer.master')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
@endsection
@section('Contact')
<section class="banner" style="background-color: #fff8e5; background-image:url({{ asset('assets/img/banner.png') }})">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-text">
                    <br><h2>Rooms</h2>
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
                        <img src="{{asset('assets/img/cat-1.jpg')}}" alt="banner">
                    </div>
                    <div class="banner-img-2">
                        <img src="{{asset('assets/img/cat-0.jpg')}}" alt="banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="{{asset('assets/img/hero-shaps-1.png')}}" alt="hero-shaps" class="img-2">
    <img src="{{asset('assets/img/hero-shaps-1.png')}}" alt="hero-shaps" class="img-4">
</section>

<div class="container">
    <div class="heading">
        <h2>Checkout</h2>
        <p> {{ $room->name }} - JOD {{ number_format($room->price_per_night, 2) }} per night</p>
    </div>

    <form action="{{ route('custumer.bookings.store', $room->id) }}" enctype="multipart/form-data" method="POST" >
        @csrf
        <div class="card">
            <h2>User Information</h2>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ $user->name }}" readonly>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}" readonly>
            </div>
        </div>

        <div class="card">
            <h2>Registered Pets</h2>
            @foreach($pets as $pet)
    <input type="radio" name="pet_option" id="pet{{$pet->id}}" value="existing_pet" data-pet-id="{{$pet->id}}">
    <div class="pets-grid">
        <label for="pet{{$pet->id}}" class="pet-card">
            <img src="{{ asset('storage/'.$pet->image) }}" alt="{{$pet->name}}" class="pet-image">
            <div class="pet-info">
                <h3>{{$pet->name}}</h3>
                <p>{{$pet->age}} Years</p>
            </div>
        </label>
    </div>
    @endforeach

            <!-- Radio button for adding a new pet -->
            <input type="radio" name="pet_option" id="add_new_pet" value="new_pet">
            <label for="add_new_pet" class="pet-card">
                <div class="pets-grid">
                    <div class="pet-info">
                        <h3>Add a New Pet</h3>
                    </div>
                </div>
            </label>
        </div>
        <input type="hidden" name="pet_id" id="pet_id" value="{{$pet->id}}">

        <!-- Form for adding a new pet -->
        <div class="card" id="new_pet_form" style="display: none;">
            <h2>Add a New Pet</h2>
            <div class="form-group">
                <label>Pet Name</label>
                <input type="text" name="new_pet_name">
            </div>
            <div class="form-group">
                <label>Pet Age</label>
                <input type="number" name="new_pet_age">
            </div>
            <div class="form-group">
                <label>Pet Image</label>
                <input type="file" name="new_pet_image">
            </div>
            <div class="form-group">
                <label>Breed</label>
                <input type="text" name="new_pet_breed">
            </div>
        </div>

        <div class="card">
            <h2>Booking Dates</h2>
            <div class="form-group">
                <label>Start Date</label>
                <input type="date" name="start_date" required>
            </div>
            <div class="form-group">
                <label>End Date</label>
                <input type="date" name="end_date" required>
            </div>
        </div>

        <div class="card">
        <button type="submit" class="button">Confirm Booking</button>

        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to confirm this booking?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, confirm it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the form
            const form = this;
            fetch(form.action, {
                method: 'POST',
                body: new FormData(form)
            })
            .then(response => {
                if (response.ok) {
                    // Show success message
                    Swal.fire({
                        title: 'Success!',
                        text: 'Your booking has been confirmed successfully!',
                        icon: 'success',
                        confirmButtonColor: '#3085d6'
                    }).then(() => {
                        // Redirect to success page
                        window.location.href = '/booking-success';  // تعديل المسار حسب الحاجة
                    });
                } else {
                    throw new Error('Something went wrong');
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'Error!',
                    text: 'There was a problem with your booking. Please try again.',
                    icon: 'error'
                });
            });
        }
    });
});
</script>
<script>
      document.addEventListener('DOMContentLoaded', function() {
    const petRadios = document.querySelectorAll('input[name="pet_option"][value="existing_pet"]');
    const petIdInput = document.getElementById('pet_id');
    const addNewPetRadio = document.getElementById('add_new_pet');
    const newPetForm = document.getElementById('new_pet_form');
    const newPetInputs = newPetForm.querySelectorAll('input[required]');

    // إدارة pet_id عند اختيار حيوان موجود
    petRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                // تحديث قيمة الحقل المخفي بمعرف الحيوان المحدد
                petIdInput.value = this.getAttribute('data-pet-id');
                newPetForm.style.display = 'none'; // إخفاء فورم إضافة حيوان جديد
                newPetInputs.forEach(input => input.removeAttribute('required')); // إزالة required من الحقول
            }
        });
    });

    // إدارة pet_id وعرض/إخفاء الفورم عند اختيار "إضافة حيوان جديد"
    addNewPetRadio.addEventListener('change', function() {
        if (this.checked) {
            petIdInput.value = ''; // إعادة تعيين الحقل المخفي
            newPetForm.style.display = 'block'; // عرض فورم إضافة حيوان جديد
            newPetInputs.forEach(input => input.setAttribute('required', true)); // إضافة required للحقول
        } else {
            newPetForm.style.display = 'none'; // إخفاء فورم إضافة حيوان جديد
            newPetInputs.forEach(input => input.removeAttribute('required')); // إزالة required من الحقول
        }
    });

    // إخفاء الفورم عند التحميل إذا لم يكن خيار "إضافة حيوان جديد" محددًا
    if (!addNewPetRadio.checked) {
        newPetForm.style.display = 'none';
        newPetInputs.forEach(input => input.removeAttribute('required'));
    }
});
</script>
@endsection