<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
  <div class="container">
    <a href="{{ route('home') }}" class="navbar-brand">
      <img src="/images/logo.png" alt="logo" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('categories') }}">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/rewards.html">Rewards</a>
        </li>
        @guest

        <li class="nav-item">
          <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('login') }}" class="btn btn-success nav-link px-4 text-white">Sign In</a>
        </li>
        @endguest
      </ul>
      @auth
          <ul class="navbar-nav d-none d-lg-flex">
            <li class="nav-item dropdown">
              <a href="" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown"> <img src="/images/user_pc.png" alt="" class="rounded-circle me-2 profile-picture" />Hi, {{ Auth::user()->name }}!</a>

              <div class="dropdown-menu">
                <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                <a href="{{ route('dashboard-settings-account') }}" class="dropdown-item">Settings</a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
              </div>
            </li>
            <li class="nav-item">
              <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                  @php
                    $carts = \App\Models\Cart::where('users_id',Auth::user()->id)->count();
                  @endphp
                  @if ($carts > 0)
                  <img src="/images/cart-filled.svg" alt="" srcset="">
                  <div class="card-badge">{{ $carts }}</div>
                  @else
                  <img src="/images/shopping 1.svg" alt="" />
                    @endif
              </a>
            </li>
          </ul>

          <ul class="navbar-nav d-grid d-lg-none mt-0">
            <li class="nav-item">
              <a href="" class="nav-link"> Hi, {{ Auth::user()->name }}! </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link d-inline-block"> Cart </a>
            </li>
          </ul>
      @endauth
    </div>
  </div>
</nav>
<!-- Navigasi baru -->
