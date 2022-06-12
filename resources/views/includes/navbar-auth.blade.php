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
              <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('categories') }}">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/rewards.html">Rewards</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
