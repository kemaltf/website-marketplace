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
            <img src="/images/lifeplanjournal.png" class="my-4" alt="" />
          </div>
          <div class="list-group list-group-flush">

            <a href="{{ route('admin-dashboard') }}" class="list-group-item list-group-item-action">
                Dashboard
            </a>

            <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/product')) ? 'active' : '' }}">
                Products
            </a>

            <a href="{{ route('product-gallery.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/product-gallery*')) ? 'active' : '' }}">
                Galleries
            </a>

            <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/category*')) ? 'active' : '' }}">
                Categories
            </a>

            <a href="#" class="list-group-item list-group-item-action">
                Transactions
            </a>

            <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/user*')) ? 'active' : '' }}">
                Users
            </a>

            <a href="/index.html" class="list-group-item list-group-item-action">
                Sign Out
            </a>
          </div>
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
                    <a href="" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown"> <img src="/images/user_pc.png" alt="" class="rounded-circle me-2 profile-picture" />Hi, User!</a>

                    <div class="dropdown-menu">
                      <a href="/" class="dropdown-item">Logout</a>
                    </div>
                  </li>
                </ul>
                <ul class="navbar-nav d-grid d-lg-none">
                  <li class="nav-item">
                    <a href="" class="nav-link"> Hi, Kemal! </a>
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
