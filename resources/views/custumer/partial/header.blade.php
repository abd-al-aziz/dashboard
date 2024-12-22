<header>
  <div class="top-bar">
    <div class="container">
      <div class="top-bar-slid">
        <div>
          <i>
            <!-- SVG icon here -->
          </i>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="bottom-bar">
      <a href="index.html"><img src="assets/img/logo_smaller.jpg" alt="logo"></a>
        <nav class="navbar">
          <ul class="navbar-links">
            <li class="navbar-dropdown">
              <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="navbar-dropdown">
              <a href="{{ route('about') }}">About</a>
            </li>
            <li class="navbar-dropdown">
              <a href="{{ route('adoptions') }}">Adoption</a>
            </li>
            <li class="navbar-dropdown">
              <a href="{{ route('services') }}">Services</a>
            </li>
            <li class="navbar-dropdown">
              <a href="{{ route('rooms') }}">Rooms</a>
            </li>
            <li class="navbar-dropdown">
              <a href="{{ route('photo-gallery') }}">Photo Gallery</a>
            </li>
            <li class="navbar-dropdown">
              <a href="{{ route('contacts') }}">Contact Us</a>
            </li>

            <!-- If user is authenticated, show Profile button instead of Login/Register -->
            @if (Auth::check())
              <li class="navbar-dropdown">
                <a href="#">Profile</a>
              </li>
            @else
              <li class="navbar-dropdown">
                <a href="{{ route('login') }}">Login</a>
              </li>
              
            @endif
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>
