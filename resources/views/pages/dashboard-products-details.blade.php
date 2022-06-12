@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product Details
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <!-- bagian judul -->
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Kursi Emfuk</h2>
                <p class="dashboard-subtitle">Product Details</p>
              </div>

              <!-- bagian konten -->
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <!-- bagian kartu -->
                    <form action="{{ route('dashboard-product-update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                      <div class="card">
                        <div class="card-body">
                          <!-- row 1 -->
                          <div class="row">
                            <!-- bagian nama produk -->
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" name="name" class="form-control" v-model="name" value="{{ $product->name }}"/>
                              </div>
                            </div>
                            <!-- bagian harga -->
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" name="price" class="form-control" v-model="name" value="{{ $product->price }}"/>
                              </div>
                            </div>
                            <!-- bagian kategori -->
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="categories_id" class="form-control">
                                    <option value="{{ $product->categories_id }}">Tidak diganti ({{ $product->category->name }})</option>
                        @foreach ($categories as $categories)
                          <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                        @endforeach
                      </select>
                              </div>
                            </div>
                            <!-- bagian deskripsi -->
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="editor">{!! $product->description !!}</textarea>
                              </div>
                            </div>
                            <!-- bagian tombol -->
                            <div class="col-md-12 d-grid mt-2">
                              <button type="submit" class="btn btn-success px-5">Save Now</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">

                          @foreach ($product->galleries as $gallery)
                              <div class="col-md-4 position-relative">
                            <div class="gallery-container">
                              <img src="{{ Storage::url($gallery->photos ?? '') }}" class="w-100" alt="" />
                              <a href="{{ route('dashboard-product-gallery-delete', $gallery->id) }}" class="delete-gallery">
                                <img src="/images/remove.svg" alt="" />
                              </a>
                            </div>
                          </div>
                          @endforeach

                          <div class="col-12 d-grid mt-2">
                            <form class="col-12 d-grid mt-2" action="{{ route('dashboard-product-gallery-upload') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="products_id" value="{{ $product->id }}">
                                <input type="file" name="photos" id="file" style="display: none" onchange="form.submit()"/>
                            <button type="button" class="btn btn-secondary" onclick="thisFileUpload()">Add Photo</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
      function thisFileUpload() {
        document.getElementById("file").click();
      }
    </script>
    <script>
      CKEDITOR.replace("editor");
    </script>
@endpush
