@extends('layouts.app')

@section('title')
    Store Detail Page
@endsection

@section('content')
    <div class="page-content page-details">
      <!-- breadcrumbs -->
      <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Product Details</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <!-- galeri detail -->
      <section class="store-gallery mb-3" id="gallery">
        <div class="container">
          <div class="row">
            <!-- bagian foto utama -->
            <div class="col-lg-8" data-aos="zoom-in">
              <transition name="slide-fade" mode="out-in">
                <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-100 main-image" alt="" />
              </transition>
            </div>
            <!-- bagian foto yg kecil2 -->
            <div class="col-lg-2">
              <div class="row">
                <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id" data-aos="zoom-in" data-aos-delay="100">
                  <a href="#" @click="changeActive(index)">
                    <img :src="photo.url" class="w-100 thumbnail-image" :class="{active: index == activePhoto}" />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- product description -->
      <div class="store-details-container" data-aos="fade-up">
        <!-- nama produk -->
        <section class="store-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <h1>{{ $product->name }}</h1>
                <div class="owner">By {{ $product->user->store_name }}</div>
                <div class="price">Rp {{ number_format($product->price) }}</div>
              </div>
              <div class="col-lg-2" data-aos="zoom-in">
                  @auth
                    <form action="{{ route('detail-add',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn btn-success px-4 text-white d-grid mb-3">Add to cart</button>
                    </form>
                  @else
                    <a href="{{ route('login') }}" class="btn btn-success px-4 text-white d-grid mb-3">Sign in to Add</a>
                  @endauth

              </div>
            </div>
          </div>
        </section>
        <!-- harga dan deskripsi produk -->
        <section class="store-description">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                {!! $product->description !!}
              </div>
            </div>
          </div>
        </section>
        <!-- customer review -->
        <section class="store-review">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8 mt-3 mt-3">
                <!-- Judul -->
                <h5>Customer Review (3)</h5>

                <!-- bagian foto, nama, dan testimoni -->
                <div class="row mt-4">
                  <div class="col-12">
                    <ul class="list-unstyled">
                      <!-- komen ke 1 -->
                      <li class="media">
                        <!-- bagian foto dan text -->
                        <div class="d-flex">
                          <div class="flex-shrink-0">
                            <img src="/images/pic (1).png" alt="..." class="me-3" />
                          </div>
                          <!-- bagian text -->
                          <div class="media-body d-flex flex-column">
                            <h5 class="mt-2 mb-1 d">Kemal TF</h5>
                            This is some content from a media component. You can replace this with any content and adjust it as needed.
                          </div>
                        </div>
                      </li>
                      <!-- komen ke 2 -->
                      <li class="media">
                        <!-- bagian foto dan text -->
                        <div class="d-flex">
                          <div class="flex-shrink-0">
                            <img src="/images/pic (2).png" alt="..." class="me-3" />
                          </div>
                          <!-- bagian text -->
                          <div class="media-body d-flex flex-column">
                            <h5 class="mt-2 mb-1 d">Kemal TF</h5>
                            This is some content from a media component. You can replace this with any content and adjust it as needed.
                          </div>
                        </div>
                      </li>
                      <!-- komen ke 3 -->
                      <li class="media">
                        <!-- bagian foto dan text -->
                        <div class="d-flex">
                          <div class="flex-shrink-0">
                            <img src="/images/pic.png" alt="..." class="me-3" />
                          </div>
                          <!-- bagian text -->
                          <div class="media-body d-flex flex-column">
                            <h5 class="mt-2 mb-1 d">Kemal TF</h5>
                            This is some content from a media component. You can replace this with any content and adjust it as needed.
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
@endsection

@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script>
      var gallery = new Vue({
        el: "#gallery",
        // mounted itu adalah script yang dijalankan saat muncul. AOS dipanggil lagi.
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 0,
          photos: [
            @foreach($product->galleries as $gallery)
            {
              id: {{ $gallery->id }},
              url: "{{ Storage::url($gallery->photos) }}",
            },
            @endforeach
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
    </script>
@endpush
