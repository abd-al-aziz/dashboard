@php
$content = ["title"=>"Contact us","short_details"=>"If you have any questions or requests - please contact us with feedback form. The administrator will respond to you within some hours.","footer_short_details"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur adipisci impedit est eius. Non eius ex ea Non eius ex ea Consequatur","email_address"=>"info@example.com","office_hour"=>"Our office hours are Monday \u2013 Friday, 9am - 6pm","address"=>"3303 Wakefield Street, Philadelphia, USA","contact_number"=>"+2025550132","latitude"=>"51.521732","longitude"=>"-0.1533447","website_footer"=>"<p>Copyright \u00a9 2023 Pawppy, All rights reserved.<\/p>"];
@endphp
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Footer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<footer class="footer-section pt-100 bg_img" data-background="{{asset($activeTemplateTrue.'images/footer-bg-01.png')}}">

    <div class="footer-top-shape">
        <img src="{{asset($activeTemplateTrue.'images/shape.png')}}" alt="shape">
    </div>

    <div class="container">
        <div class="footer-top-area">
            <div class="footer-logo">
                <a class="site-logo site-title" href="{{ route('home') }}"><img
                        src="{{getImage(getFilePath('logoIcon') .'/logo.png')}}" alt="site-logo"></a>
            </div>
            <div class="social-area">
                
            </div>
        </div>
        <div class="row mb-30-none justify-content-center">
            <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                <div class="footer-widget">
                    <h3 class="title">@lang('About Us')</h3>
                    <img src="{{asset($activeTemplateTrue.'images/shape-blue.png')}}" alt="shape"
                        class="footer-shpae">
                    <p>{{$content['footer_short_details']}}</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 mb-30">
                <div class="footer-widget">
                    <h3 class="title">@lang('Contact Info')</h3>
                    <img src="{{asset($activeTemplateTrue.'images/shape-blue.png')}}" alt="shape"
                        class="footer-shpae">
                    <ul class="footer-list">
                        <li class="d-flex"><i class="las la-phone"></i><a
                                href="tel:{{$content['contact_number']}}">
                                {{$content['contact_number']}}</a></li>
                        <li class="d-flex"><i class="las la-envelope"></i><a
                                href="mailto:{{$content['email_address']}}">
                                {{$content['email_address']}}</a></li>
                        <li class="d-flex"><i class="las la-map-marker-alt"></i><a href="javascript:void(0)">
                                {{__($content['address'])}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                <div class="footer-widget">
                    <h3 class="title">@lang('Useful Links')</h3>
                    <img src="{{asset($activeTemplateTrue.'images/shape-blue.png')}}" alt="shape"
                        class="footer-shpae">
                    
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                <div class="footer-widget">
                    <h3 class="title">@lang('Newsletter')</h3>
                    <img src="{{asset($activeTemplateTrue.'images/shape-blue.png')}}" alt="shape"
                        class="footer-shpae">
                    <form class="newsletter-form" method="post" action="{{ route('subscribe') }}">
                        @csrf
                        <input type="email" class="form--control" name="email" placeholder="@lang('Your email')...">
                        <button type="submit" class="btn--base w-100">@lang('Subscribe')</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            @php echo $content['website_footer']; @endphp
        </div>
    </div>
</footer>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Footer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
