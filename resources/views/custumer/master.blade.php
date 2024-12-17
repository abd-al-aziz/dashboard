<!DOCTYPE html>
<html lang="zxx">
@include('custumer.partial.head')
@include('custumer.partial.header')
<body>
<!-- loader -->
@include('custumer.partial.loader')
<!-- loader end -->

@yield('Contact')

@include('custumer.partial.footer')

<!-- search-popup -->
<div class="search-popup">
        <button class="close-search"><i class="fa-solid fa-arrow-right"></i></button>
        <form method="post" action="#">
            <div class="form-group">
                <input type="search" name="search-field" value="" placeholder="Search Here" required="">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
</div>
<!-- search-popup end -->


@include('custumer.partial.script')
</body>
