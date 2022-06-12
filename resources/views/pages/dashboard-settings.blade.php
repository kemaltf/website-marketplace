@extends('layouts.dashboard')

@section('title')
    Store Settings
@endsection

@section('content')
     <!-- section content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Store Settings</h2>
                <p class="dashboard-subtitle">Make store that profitable</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="{{ route('dashboard-settings-redirect','dashboard-settings-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Store Name</label>
                                <input type="text" name="store_name" value="{{ $user->store_name }}" class="form-control" v-model="name" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="categories_id" class="form-control">
                                    <option value="{{ $user->categories_id }}">Tidak diganti</option>
                        @foreach ($categories as $categories)
                          <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                        @endforeach
                      </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Store</label>
                                <p class="text-muted">Apakah saat ini toko Anda buka?</p>

                                <!-- custom radio -->
                                <div class="form-check form-check-inline">
                                  <input type="radio" class="form-check-input custom-control-input" name="store_status" id="openStoreTrue" value="1" {{ $user->store_status == 1 ? 'checked' :  '' }}/>
                                  <label for="openStoreTrue" class="form-check-label">Buka</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input type="radio" class="form-check-input custom-control-input" name="is_store_open" id="openstoreFalse" value="0" {{ $user->store_status == 0 || $user->store_status == NULL ?  'checked' :  '' }} />
                                  <label for="openstoreFalse" class="form-check-label">Tutup sementara</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col text-end">
                              <button type="submit" class="btn btn-success px-5">Save Now</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
