@extends('custumer.master')

@section('Contact')
<div class="container text-center mt-5 mb-5 flex-center" style="height:70vh">
    <div class="success-message">
        <i class="fas fa-check-circle fa-5x text-success mb-4"></i>
        <h2>Booking Confirmed!</h2>
        <p>Thank you for your booking. Your reservation has been successfully confirmed.</p>
        <a href="{{ route('home') }}" class="button">Home</a>
    </div>
</div>
@endsection