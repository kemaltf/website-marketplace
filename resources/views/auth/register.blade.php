@extends('layouts.auth')

@section('content')

<div class="page-content page-auth" id="register">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center justify-content-center row-login">
            <div class="col-lg-4">
              <h2>
                Memulai untuk jual beli <br />
                dengan mendaftar
              </h2>
              <form method="POST" action="{{ route('register') }}">
                        @csrf
                <div class="form-group">
                  <label for="">Full name</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" v-model="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                  <label for="">Email address</label>
                    <input id="email"
                    v-model="email"
                    @change = "checkForEmailAvailability()"
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    :class="{ 'is-invalid' : this.email_unavailable }"  name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                  <label for="">Konfirmasi Password</label>
                  <input id="password-confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                  <label for="">Store</label>
                  <p class="text-muted">Apakah Anda ingin membuka toko?</p>

                  <!-- custom radio -->
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input custom-control-input" name="is_store_open" id="openStoreTrue" v-model="is_store_open" :value="true" />
                    <label for="openStoreTrue" class="form-check-label">Iya, boleh</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input custom-control-input" name="is_store_open" id="openstoreFalse" v-model="is_store_open" :value="false" />
                    <label for="openstoreFalse" class="form-check-label">Enggak, makasih</label>
                  </div>
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label for="">Nama toko</label>
                  <input type="text" v-model="store_name" id="store_name" name="store_name" class="form-control @error('store_name') is-invalid @enderror" v-model="name" required autocomplete autofocus/>
                  @error('store_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label for="">Kategori</label>
                  <select name="categories_id" class="form-control">
                    <option value="" disabled>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="btn btn-success d-grid w-100 mt-3" :disabled = "this.email_unavailable">Sign Up Now</button>
                <a href="{{ route('login') }}" class="btn btn-signup d-grid w-100 mt-2">Back to Sign In</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
{{--
<div class="container" style="display: none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
      Vue.use(Toasted);
      var register = new Vue({
        el: "#register",
        mounted() {
          AOS.init();
        },
        methods: {
            checkForEmailAvailability: function () {
                var self = this;
                axios.get('{{ route('api-register-check') }}', {
                    params: {
                        email: this.email
                    }
                })
                    .then(function (response) {

                        if(response.data=='Available'){
                            self.$toasted.show("Email Anda tersedia", {
                            position: "top-center",
                            className: "rounded",
                            duration: 1000,
                        }
                        );
                        self.email_unavailable = false;

                        }else{
                            self.$toasted.error("Maaf, email sudah terdaftar.", {
                            position: "top-center",
                            className: "rounded",
                            duration: 1000,
                        });
                        self.email_unavailable=true;

                        }
                        // handle success
                        console.log(response);
                    })
            }
        },
        data() {
            return {
                name: "kemaltf",
                email: "kemaltf@gmail.com",
                is_store_open: true,
                store_name: "",
                email_unavailable: false
            }
        },
      });
    </script>
@endpush
