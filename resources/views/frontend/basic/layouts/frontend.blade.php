<!doctype html>
<html lang="{{ config('app.locale', 'en') }}" itemscope itemtype="http://schema.org/WebPage">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Test</title>
    
    <!-- Include SEO Meta Tags -->
    @includeIf('frontend.seo')

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:ital,wght@0,200;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

    <!-- Bootstrap & Common CSS -->
    <link href="{{ asset('assets/common/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/common/css/line-awesome.min.css') }}">
    
    <!-- Template Specific CSS -->
    <link rel="stylesheet" href="{{ asset('templates/basic/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/basic/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/basic/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/basic/css/style.css') }}">

    @stack('style-lib')
    @stack('style')
</head>

<body>
    <!-- Loader -->
    <div id="loader">
        <span class="loader"></span>
    </div>

    <!-- Header -->
    @includeIf('frontend.basic.partials.header')

    <!-- Breadcrumb Section -->
    @if(request()->route()->uri() !== '/')
    <section class="breadcrumb-section bg_img">
        <img src="{{ asset('templates/basic/images/breadcrumb-img.png') }}" alt="breadcrumb-img" class="breadcrumb-img-left">
        <img src="{{ asset('templates/basic/images/breadcrumb-img.png') }}" alt="breadcrumb-img" class="breadcrumb-img-right">

        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="banner-content">
                        <div class="breadcrumb-area">
                            <nav aria-label="breadcrumb">
                                <h1 class="title">Test</h1>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('Home')</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Hi4</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-shape">
            <img src="{{ asset('templates/basic/images/inner-shape.png') }}" alt="shape">
        </div>
    </section>
    @endif

    <!-- Content Section -->
    @yield('content')

    <!-- GDPR Cookie Policy -->
    @php
    $cookie = [
        "short_desc" => "We use cookies to enhance your browsing experience, serve personalized ads or content, and analyze our traffic. By clicking \"Accept\", you consent to our use of cookies.",
        "status" => 1
    ];
    @endphp

    @if($cookie['status'] === 1 && !Cookie::get('gdpr_cookie'))
    <div class="cookies-card hide">
        <h2 class="section-title">@lang('GDPR Cookie Policy')</h2>
        <p class="mt-4 cookies-card__content"> <a href="" class="text--primary" target="_blank">@lang('Learn more')</a></p>
        <div class="cookies-card__btn mt-4">
            <a href="javascript:void(0)" class="btn btn--base policy">@lang('Accept')</a>
        </div>
    </div>
    @endif

    <!-- JavaScript -->
    <script src="{{ asset('assets/common/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/common/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('templates/basic/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('templates/basic/js/swiper.min.js') }}"></script>
    <script src="{{ asset('templates/basic/js/wow.min.js') }}"></script>
    <script src="{{ asset('templates/basic/js/rangeSlider.js') }}"></script>
    <script src="{{ asset('templates/basic/js/main.js') }}"></script>

    @stack('script-lib')
    @stack('script')

    <script>
        (function ($) {
            "use strict";

            // Language selector functionality
            $(".language-select").on("change", function () {
                window.location.href = $(this).val();
            });

            // GDPR Cookie Handling
            setTimeout(function () {
                $('.cookies-card').removeClass('hide');
            }, 2000);

            // Form Handling
            $('input, select, textarea').each(function () {
                const element = $(this);
                const label = element.closest('.form-group').find('label');

                label.attr('for', element.attr('name'));
                element.attr('id', element.attr('name'));

                if (element.is('[required]')) {
                    label.addClass('required');
                }
            });
        })(jQuery);
    </script>
</body>

</html>
