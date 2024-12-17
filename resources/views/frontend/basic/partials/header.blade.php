<?php
$content = ["title"=>"Contact us","short_details"=>"If you have any questions or requests - please contact us with feedback form. The administrator will respond to you within some hours.","footer_short_details"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur adipisci impedit est eius. Non eius ex ea Non eius ex ea Consequatur","email_address"=>"info@example.com","office_hour"=>"Our office hours are Monday \u2013 Friday, 9am - 6pm","address"=>"3303 Wakefield Street, Philadelphia, USA","contact_number"=>"+2025550132","latitude"=>"51.521732","longitude"=>"-0.1533447","website_footer"=>"<p>Copyright \u00a9 2023 Pawppy, All rights reserved.<\/p>"];
       
$socialIcons = 4;
$languages = 'English';
$wishlistCount = 8;
?>

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<header class="header-section">
    <div class="header">
        <div class="header-top-area">
            <div class="container">
                <div class="header-top-menu">
                    <div class="left">
                        <ul class="header-contact-list">
                            <li><a href="mailto:"><i class="las la-envelope-open-text"></i>
                                    {{$content['email_address']}}</a></li>
                            <li><a href="tel:{{$content['contact_number']}}"><i class="las la-phone"></i>
                                    {{$content['contact_number']}}</a></li>
                        </ul>
                    </div>
                    <div class="right">
                        
                        
                        <div class="header-action">

                            @guest
                            <a href="" class="btn--base">
                               @lang('Login') <i class="las la-sign-in-alt"></i>
                            </a>
                            @else
                            <a href="" class="btn--base color-rev">
                                @lang('Dashboard') <i class="las la-tachometer-alt"></i>
                            </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom-area">
            <div class="container">
                <div class="header-menu-content">
                    <nav class="navbar navbar-expand-lg p-0">
                        <a class="site-logo site-title" href=""><img
                                src="" alt="sitdde-logo"></a>
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav main-menu ms-auto" id="mobile-menu">
                               
                                <li><a href="">@lang('Services')</a></li>
                                <li><a href="">@lang('Blog')</a></li>
                                <li><a href="">@lang('Contact')</a></li>
                                <li>
                                    <ul class="shop-cat-wrap">
                                        <li class="shopping-cart position-relative">
                                            <a href="">
                                                <i class="fas fa-cart-plus"></i>
                                                <span class="count-item" id="cartItem">{{ count((array) session('cart')) }}</span>
                                            </a>
                                        </li>
                                        <li class='shopping-cart position-relative'>
                                            <a  href="">
                                                <i class="fas fa-heart"></i>
                                                <span class="count-item" id="wishlistItem">{{__($wishlistCount)}}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>


<button class="scrollToTop">
    <i class="las la-arrow-up"></i>
</button>



<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
