@extends('auth.layouts.auth-layouts')


@section('content')
    @include('sweetalert::alert')
    <div class="login">
        @if (Session::Has('errorLogin'))
            <div class="alert alert-danger mt-3" role="alert">
                <i class="fa-solid fa-circle-exclamation"></i> {{ Session::get('errorLogin') }}
            </div>
        @endif

    <section
      class="d-flex justify-content-center align-items-center"
      id="login"
    >
      <div
        class="container-fluid d-flex justify-content-center align-items-center"
      >
        <div class="row loginForm">
          <div
            class="col-md-6 d-flex justify-content-between flex-column loginDesc"
          >
            <div class="row">
              <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="Logo" />
            </div>
            <div class="row mb-5">
              <h1>
                Silahkan Masukkan <br />
                Akun Anda
              </h1>
            </div>
            <div class="row">
              <p>Menggunakan Email / No.Hp Yang Terdaftar</p>
            </div>
          </div>
          <div class="col-md-6 d-flex justify-content-between flex-column">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row">
                    <div class="mb-3">
                      <label for="email" class="form-label">Email Address / No. Hp</label>
                      <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="login" required autofocus>
                      @error('email')
                        <div class="invalid-feedback">
                          <strong>{{ $message }}</strong>
                        </div>
                      @enderror
                    </div>
                </div>
                
                <div class="row">
                    <div class="mb-3">
                      <label for="newPassword" class="form-label">Password Baru</label>
                      <input id="newPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      @error('password')
                        <div class="invalid-feedback">
                          <strong>{{ $message }}</strong>
                        </div>
                      @enderror
                    </div>
                </div>
                
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-first">Selesai</button>
                    <p class="mt-3 text-center">Belum punya akun ? <a href="/register">buat akun sekarang</a></p>
                </div>
               

            </form>
          </div>
        </div>
      </div>
    </section>

@endsection
