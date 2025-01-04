<header>
  <style>
    .top-bar {
      width: 100%;
    }
    
    .logo {
      margin-left: 50px;
    }
    
    .logo img {
      height: 70px;
      width: 70px;
      border-radius: 50%;
    }
    
    .bottom-bar {
      display: flex;
      align-items: center;
      padding: 10px 0;
    }
    
    .navbar {
      display: flex;
      justify-content: center;
      flex-grow: 2;
    }
    
    .navbar-links {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
      gap: 10px;
    }
    
    .navbar-dropdown a {
      text-decoration: none;
      color: #333;
    }
    
    .submit-btn {
      background: none;
      border: none;
      cursor: pointer;
      padding: 0;
    }
    
    /* Hamburger menu */
    .menu-toggle {
      display: none;
      cursor: pointer;
      font-size: 24px;
      padding: 10px;
    }
    
    /* Responsive Design */
    @media screen and (max-width: 768px) {
      .bottom-bar {
        flex-direction: column;
        align-items: flex-start;
      }
      
      .logo {
        margin-bottom: 15px;
        margin-right: 0;
      }
      
      .menu-toggle {
        display: block;
        position: absolute;
        right: 20px;
        top: 20px;
      }
      
      .navbar {
        width: 100%;
        display: none;
      }
      
      .navbar.active {
        display: block;
      }
      
      .navbar-links {
        flex-direction: column;
        width: 100%;
        gap: 10px;
        padding: 10px 0;
      }
      
      .navbar-dropdown {
        width: 100%;
        text-align: left;
        padding: 8px 0;
      }
    }
  </style>

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
      <div class="menu-toggle" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
      </div>
      
      <div class="logo">
        <a href="{{ route('home') }}"><img src="{{ asset('assets/img/loogo.jpg') }}" alt="Logo"></a>
      </div>

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
          
          @if (Auth::check())
            <li class="navbar-dropdown">
              <a href="{{ route('profile.show') }}"><i class="fa-solid fa-user"></i></a>
            </li>
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
</header>

<script>
function toggleMenu() {
  const navbar = document.querySelector('.navbar');
  navbar.classList.toggle('active');
}

// إغلاق القائمة عند النقر خارجها
document.addEventListener('click', function(event) {
  const navbar = document.querySelector('.navbar');
  const menuToggle = document.querySelector('.menu-toggle');
  
  if (!navbar.contains(event.target) && !menuToggle.contains(event.target)) {
    navbar.classList.remove('active');
  }
});
</script>