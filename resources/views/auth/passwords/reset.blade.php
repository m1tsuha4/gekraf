@extends('auth.layouts.auth-layouts')
@section('content')
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
                Password Anda
              </h1>
            </div>
            <div class="row">
              <p>Jangan Lupa Untuk Mengingat Password dengan baik</p>
            </div>
          </div>
          <div class="col-md-6 d-flex justify-content-between flex-column">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="row">
                    <div class="mb-3">
                      <label for="email" class="form-label">Email Address</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                    <div class="mb-5">
                      <label for="confirmPassword" class="form-label">Masukkan Ulang Password</label>
                      <input id="confirmPassword" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-first">Selesai</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection
