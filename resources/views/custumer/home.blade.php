@extends('custumer.master')
@section('Contact')
<section class="hero-two">
    <div class="container">
        <div class="row hero-two-slider owl-carousel owl-theme">
            <div class="col-lg-12 item">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-two-img">
                            <img src="assets/img/owner.png" alt="hero-two-img" style="border-radius: 15px; overflow: hidden;">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-two-text">
                            <h1>Loving Care For Your Pets</h1><br>
                            <br><p>cat hotel provides the best staying and boarding service in healthy and comfortable environment.</p>
                            <a href="{{ route('rooms') }}" class="button">Get Booking</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 item">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-two-img">
                            <img src="assets/img/owner.png" alt="hero-two-img" style="border-radius: 15px; overflow: hidden;">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-two-text">
                            <h1>For Your Pets Loving Care</h1><br>
                            <br><p>cat hotel provides the best staying and boarding service in healthy and comfortable environment.</p>
                            <a href="contact.html" class="button">Get Booking</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="assets/img/hero-shaps-2.png" class="hero-shaps-2" alt="hero-shaps">
    <img src="assets/img/hero-shaps-3.png" class="hero-shaps-3" alt="hero-shaps">
    <img src="assets/img/hero-shaps-3.png" class="hero-shaps-4" alt="hero-shaps">
</section>

<section class="gap">
    <div class="container">
        <div class="heading">
            <img src="assets/img/heading-img.png" alt="heading-img">
            <h6>Cats seeking a forever home</h6>
            <h2>Looking For A Room For Your Pet</h2>
        </div>
        <div class="package two">
            <div class="package-text">
                <div>
                    <h4>
                        JOD 5.00
                        <span>/ Per Day</span>
                    </h4>
                    <div class="room-status mb-3">
                        <span class="badge bg-success" style="padding: 8px 15px; font-size: 14px;">
                            Available
                        </span>
                    </div>
                    <p class="mb-4">A cozy room perfect for your pet's comfort and care.</p>
                    <ul class="list">
                        <li><i class="fa-solid fa-check"></i> Health Care</li>
                        <li><i class="fa-solid fa-check"></i> Space to Play</li>
                        <li><i class="fa-solid fa-check"></i> Grooming you can feel good about</li>
                        <li><i class="fa-solid fa-check"></i> Space to Play</li>
                    </ul>
                    <a href="{{ route('rooms') }}" class="button">Book Room</a>
                </div>
            </div>
            <figure>
                <img src="assets/img/room-5.jpg" alt="Room">
            </figure>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <div class="heading">
            <img src="assets/img/heading-img.png" alt="heading-img">
            <h6>Cats seeking a forever home</h6>
            <h2>Looking For A New Pet</h2>
            <!-- <br><a href="{{ route('adoptions') }}" class="button">
                Explore Now
            </a> -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="pets">
                        <img src="assets/img/g-6.jpg" alt="pets" class="img-fluid">
                        <h3><a href="#">Cindy</a></h3>
                        <h6>Britich</h6>
                        <span>1 years</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="pets">
                        <img src="assets/img/g-7.jpg" alt="pets" class="img-fluid">
                        <h3><a href="#">Russi</a></h3>
                        <h6>Skotch</h6>
                        <span>2 - 3 years</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="pets">
                        <img src="assets/img/g-12.webp" alt="pets" class="img-fluid">
                        <h3><a href="#">Bella</a></h3>
                        <h6>German Shepherd</h6>
                        <span>3 - 4 years</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="pets">
                        <img src="assets/img/g-11.webp" alt="pets" class="img-fluid">
                        <h3><a href="#">Luna</a></h3>
                        <h6>Persian Cat</h6>
                        <span>1 - 2 years</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="heading">
            <br><a href="{{ route('adoptions') }}" class="button">
                Adopt Now
            </a>
        </div>
    </div>
</section>

<section class="gap section-client" style="background-image: url(assets/img/client-b.jpg)">
    <div class="container">
        <div class="heading two">
            <h2>What Our Client’s Say</h2>
        </div>
        <div class="client-slider owl-carousel owl-theme">
            <div class="item">
                <div class="client">
                    <img src="assets/img/client.png" alt="client">
                    <div class="client-text">
                        <p>The best cat hotels in town. The owner is one of the kindest humans ever and he's a true cat/animal lover.
                           If you want to travel and have no place to put your pet at, definitely go here!
                           10/10 would recommend!!</p>
                        <h4>Malak Al Saleem</h4>
                        <span>Client</span>
                        <i class="quote">
                            <img src="assets/img/quote.png" alt="quote">
                        </i>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="client">
                    <img src="assets/img/client.png" alt="client">
                    <div class="client-text">
                        <p>I can't recommend this place enough! If you are looking for a place to board your cat while traveling or moving or for any reason you will not find a better place. The owner Odai is a lovely guy and very cooperative and helpful.</p>
                        <h4>Waseem Jabasini</h4>
                        <span>Client</span>
                        <i class="quote">
                            <img src="assets/img/quote.png" alt="quote">
                        </i>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="client">
                    <img src="assets/img/client.png" alt="client">
                    <div class="client-text">
                        <p>I took my rescue kitten there twice while I was away and had a very good experience. The place is a bit far from the center, but the cats are well taken care of, and the rooms where the cats stay is beautifully made! I do recommend it.</p>
                        <h4>Kathi B.</h4>
                        <span>Client</span>
                        <i class="quote">
                            <img src="assets/img/quote.png" alt="quote">
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
