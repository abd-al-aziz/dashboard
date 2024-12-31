@extends('custumer.master')

@section('Contact')
<section class="banner" style="background-color: #fff8e5; background-image:url(assets/img/banner.png)">
   <div class="container">
       <div class="row align-items-center">
           <div class="col-lg-6">
               <div class="banner-text">
                   <h2>Adoption</h2>
                   <ol class="breadcrumb">
                       <li class="breadcrumb-item">
                           <a href="index.html">Home</a>
                       </li>
                       <li class="breadcrumb-item active" aria-current="page">Adoption</li>
                   </ol>
               </div>
           </div>
           <div class="col-lg-6">
               <div class="banner-img">
                   <div class="banner-img-1">
                       <svg width="260" height="260" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#fa441d"></path>
                       </svg>
                       <img src="assets/img/cat-1.jpg" alt="banner">
                   </div>
                   <div class="banner-img-2">
                       <svg width="320" height="320" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z" fill="#fa441d"></path>
                       </svg>
                       <img src="assets/img/cat-0.jpg" alt="banner">
                   </div>
               </div>
           </div>
       </div>
   </div>
   <img src="assets/img/hero-shaps-1.png" alt="hero-shaps" class="img-2">
   <img src="assets/img/hero-shaps-1.png" alt="hero-shaps" class="img-4">
</section>

<section class="py-5">
   <div class="container">
       <div class="heading text-center mb-5">
           <img src="assets/img/heading-img.png" alt="heading-img" class="mb-3" style="width: 80px;">
           <h6 class="text-uppercase text-muted">Cats seeking a forever home</h6>
           <h2 class="font-weight-bold">Looking For A New Pet</h2>
       </div>

       @if($adoptions->count() > 0)
       <div class="row">
           @foreach($adoptions as $adoption)
           <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="pets card h-100 d-flex flex-column">
                <img src="{{ asset('storage/'.$adoption->image) }}" class="card-img-top uniform-image" alt="{{ $adoption->name }}">
                <div class="card-body d-flex flex-column">
                    <h3>{{ $adoption->name }}</h3>
                    <p><strong>Breed:</strong> {{ $adoption->breed }}</p>
                    <p><strong>Age:</strong> {{ $adoption->age }} Year</p>
                    <p><strong>Personality:</strong> {{ $adoption->personality }}</p>
                    <div class="btn-group mt-auto"> 
                        <a href="#" 
                           class="btn btn-warning bg-danger bg-gradient text-white w-100 adopt-btn"  
                           data-form-id="adopt-form-{{ $adoption->id }}">
                            Adopt Now
                        </a>
                        <form id="adopt-form-{{ $adoption->id }}" 
                              action="{{ route('adoption.request', $adoption) }}" 
                              method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div> 
               </div>
           @endforeach
       </div>

       <div class="mt-4 text-danger d-flex justify-content-center">
           {{ $adoptions->links('pagination::bootstrap-5') }}
       </div>
       @else
           <div class="text-center py-5">
               <div class="alert alert-info">
                   <h3 class="text-muted mb-3">No cats are available for adoption at the moment.</h3>
                   <p class="mb-0">Please check back later for new arrivals.</p>
               </div>
           </div>
       @endif
   </div>
</section>

<style>
    .uniform-image {
        width: 100%;
        height: 250px;
        object-fit: cover; 
        border-radius: 10px; 
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.adopt-btn').forEach(button => {
   button.addEventListener('click', function(e) {
       e.preventDefault();
       const formId = this.dataset.formId;
       
       Swal.fire({
           title: 'Are you sure?',
           text: "Do you want to adopt this cat?",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes',
           cancelButtonText: 'No'
       }).then((result) => {
           if (result.isConfirmed) {
               document.getElementById(formId).submit();
               Swal.fire(
                   'Adopted!',
                   'The cat has been successfully adopted.',
                   'success'
               )
           }
       })
   });
});
</script>

@endsection
