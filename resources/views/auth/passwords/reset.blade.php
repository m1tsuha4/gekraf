{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
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
              <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="" />
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
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                <div class="row">
                    <div class="mb-3">
                      <label for="newPassword" class="form-label">Password Baru</label>
                      <input type="password" class="form-control" name="password" id="newPassword" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
              
                  <div class="row">
                    <div class="mb-5">
                      <label for="confirmPassword" class="form-label">Masukkan Ulang Password</label>
                      <input type="password" class="form-control" name="password_confirmation" id="confirmPassword" />
                    </div>
                  </div>
                  <div class="row">
                      <button class="btn btn-primary btn-first" >Selesai</button>
                  </div>
            </form>
        </div>
      </div>
    </section>
@endsection
    