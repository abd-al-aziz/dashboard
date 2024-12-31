<style>
  .logo {
        margin-right: 20px;
    }

    .logo img {
        height: 70px;
        width: 70px;
        border-radius: 50%;

    }
    </style>
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
    <div class="logo">
            <a href="{{ route('home') }}"><img src="{{ asset('assets/img/loogo.jpg') }}" alt="Logo"></a>
        </div>
        <nav class="navbar flex-grow-2 justify-content-center">
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
            

            <!-- If user is authenticated, show Profile and Logout options -->
            @if (Auth::check())
              <li class="navbar-dropdown">
                <a href="{{ route('profile.show') }}"><i class="fa-solid fa-user"></i></a>
              </li>
              <!-- Logout Form -->
              <li class="navbar-dropdown">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="submit-btn">
                   <i class="fas fa-sign-out-alt"></i> 
                   </button>
                </form>
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
