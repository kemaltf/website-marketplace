<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- sidebar -->
        <div class="border-end" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="/images/seller.png" class="my-4" alt="" />
          </div>
          <div class="list-group list-group-flush">
            <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard')) ? 'active' : '' }}" >Dashboard</a>

            <a href="{{ route('dashboard-product') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard/products*')) ? 'active' : '' }}">My Product</a>
            <a href="{{ route('dashboard-transaction') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard/transactions*')) ? 'active' : '' }}">Transactions</a>
            <a href="{{ route('dashboard-settings-store') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard/settings*')) ? 'active' : '' }}">Store Settings</a>
            <a href="{{ route('dashboard-settings-account') }}" class="list-group-item list-group-item-action {{ (request()->is('dashboard/account*')) ? 'active' : '' }}">My Account</a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action">Sign Out</a>
          </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
        </div>

        <!-- Page content -->
        <div id="page-content-wrapper">
          <!-- Navigasi baru -->
          <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
            <div class="container-fluid">
              <button class="btn btn-secondary d-md-none me-auto me-2" id="menu-toggle">&laquo; Menu</button>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Desktop menu -->
                <ul class="navbar-nav d-none d-lg-flex ms-auto">
                  <li class="nav-item dropdown">
                    <a href="" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown"> <img src="/images/user_pc.png" alt="" class="rounded-circle me-2 profile-picture" />Hi, {{ Auth::user()->name }}!</a>

                    <div class="dropdown-menu">
                <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                <a href="{{ route('dashboard-settings-account') }}" class="dropdown-item">Settings</a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
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
                <ul class="navbar-nav d-grid d-lg-none">
                  <li class="nav-item">
                    <a href="" class="nav-link"> Hi, {{ Auth::user()->name }}! </a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link d-inline-block"> Cart </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          {{-- Content --}}
          @yield('content')

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    @include('includes.script')

    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>

    @stack('addon-script')
  </body>
</html>
