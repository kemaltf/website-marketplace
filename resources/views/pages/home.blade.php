@extends('layouts.app')

@section('title')
    Store Homepage
@endsection

@section('content')
    <div class="page-content page-home">
      <!-- Caraousel section -->
      <section class="store-carousel">
        <div class="container">
          <div class="row">
            <div class="col-lg-12" data-aos="zoom-in">
              <div id="storeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#storeCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#storeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#storeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/images/banner.png" class="d-block w-100" alt="Carousel Image" />
                  </div>
                  <div class="carousel-item">
                    <img src="/images/banner.png" class="d-block w-100" alt="Carousel Image" />
                  </div>
                  <div class="carousel-item">
                    <img src="/images/banner.png" class="d-block w-100" alt="Carousel Image" />
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- categories section -->
      <section class="store-trend-categories">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Trend Categories</h5>
            </div>
          </div>
          <div class="row">
            @php $incrementCategory = 0 @endphp
            <!-- kategori 1 -->
            @forelse ($categories as $category)
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementCategory += 100 }}">
              <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                <div class="categories-image">
                  <img src="{{ Storage::url($category->photo) }}" alt="" class="w-100" />
                </div>
                <p class="categories-text">{{ $category->name }}</p>
              </a>
            </div>
            @empty
                <div class="col-12 text-center py-5"
                data-aos="fade-up"data-aos-delay="100">
                    No Categories Found
                </div>
            @endforelse

            {{-- <!-- kategori 2 -->
            <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="200">
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img src="/images/Group 15.svg" alt="" class="w-100" />
                </div>
                <p class="categories-text">Gadgets</p>
              </a>
            </div>
            <!-- kategori 3 -->
            <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="300">
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img src="/images/Group 16.svg" alt="" class="w-100" />
                </div>
                <p class="categories-text">Gadgets</p>
              </a>
            </div>
            <!-- kategori 4 -->
            <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="400">
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img src="/images/Group 17.svg" alt="" class="w-100" />
                </div>
                <p class="categories-text">Gadgets</p>
              </a>
            </div>
            <!-- kategori 5 -->
            <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="500">
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img src="/images/Group 19.svg" alt="" class="w-100" />
                </div>
                <p class="categories-text">Gadgets</p>
              </a>
            </div>
            <!-- kategori 6 -->
            <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="600">
              <a href="#" class="component-categories d-block">
                <div class="categories-image">
                  <img src="/images/Group 20.svg" alt="" class="w-100" />
                </div>
                <p class="categories-text">Gadgets</p>
              </a>
            </div> --}}
          </div>
        </div>
      </section>

      <!-- New product section -->
      <section class="store-new-products">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>New Products</h5>
            </div>
          </div>
          <div class="row">
            @php $incrementProduct = 0 @endphp
            @forelse ($products as $product)
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $incrementProduct += 100 }}">
              <a href="{{ route('detail',$product->slug) }}" class="component-products d-block">
                <div class="products-thumbnail">
                  <div class="products-image"
                  style="
                @if($product->galleries->count())
                    background-image: url('{{ Storage::url($product->galleries->first()->photos)}}')
                @else
                    background-color:#eee
                @endif
                    ">

                    </div>
                </div>
                <div class="products-text">{{ $product->name }}</div>
                <div class="products-price">Rp {{ $product->price }}</div>
              </a>
            </div>
            @empty
                <div class="col-12 text-center py-5"
                data-aos="fade-up"data-aos-delay="100">
                    No Categories Found
                </div>
            @endforelse
            {{-- <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
              <a href="/details.html" class="component-products d-block">
                <div class="products-thumbnail">
                  <div class="products-image" style="background-image: url('/images/image\ 7.png')"></div>
                </div>
                <div class="products-text">Apple Watch 4</div>
                <div class="products-price">Rp 10.000</div>
              </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300">
              <a href="/details.html" class="component-products d-block">
                <div class="products-thumbnail">
                  <div class="products-image" style="background-image: url('/images/Vector.png')"></div>
                </div>
                <div class="products-text">Apple Watch 4</div>
                <div class="products-price">Rp 10.000</div>
              </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="400">
              <a href="/details.html" class="component-products d-block">
                <div class="products-thumbnail">
                  <div class="products-image" style="background-image: url('/images/Vector.png')"></div>
                </div>
                <div class="products-text">Apple Watch 4</div>
                <div class="products-price">Rp 10.000</div>
              </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="500">
              <a href="/details.html" class="component-products d-block">
                <div class="products-thumbnail">
                  <div class="products-image" style="background-image: url('/images/image\ 6.png')"></div>
                </div>
                <div class="products-text">Apple Watch 4</div>
                <div class="products-price">Rp 10.000</div>
              </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="600">
              <a href="/details.html" class="component-products d-block">
                <div class="products-thumbnail">
                  <div class="products-image" style="background-image: url('/images/image\ 7.png')"></div>
                </div>
                <div class="products-text">Apple Watch 4</div>
                <div class="products-price">Rp 10.000</div>
              </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="700">
              <a href="/details.html" class="component-products d-block">
                <div class="products-thumbnail">
                  <div class="products-image" style="background-image: url('/images/Vector.png')"></div>
                </div>
                <div class="products-text">Apple Watch 4</div>
                <div class="products-price">Rp 10.000</div>
              </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800">
              <a href="/details.html" class="component-products d-block">
                <div class="products-thumbnail">
                  <div class="products-image" style="background-image: url('/images/Vector.png')"></div>
                </div>
                <div class="products-text">Apple Watch 4</div>
                <div class="products-price">Rp 10.000</div>
              </a>
            </div> --}}
          </div>
        </div>
      </section>
    </div>
@endsection
