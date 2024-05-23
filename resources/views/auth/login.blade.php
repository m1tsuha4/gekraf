@extends('user.layouts.index')

@section('content')
    @include('sweetalert::alert')
    <div class="login">
        @if (Session::Has('errorLogin'))
            <div class="alert alert-danger mt-3" role="alert">
                <i class="fa-solid fa-circle-exclamation"></i> {{ Session::get('errorLogin') }}
            </div>
        @endif

        <div class="pembungkus-login">
            <h1>Masuk</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="inputan">
                    <div class="inputan-isi">
                        <label for="email" class="">Email</label>
                        <div class="input">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="example@gmail.com">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="inputan-isi">
                        <label for="password" class="">Password</label>
                        <div class="input">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="">
                            <div class="forgot-password">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- <div class="remember-me">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div> --}}
                        </div>
                    </div>

                </div>
                <div class="login-button">
                    <button type="submit" class="">
                        Masuk
                    </button>
                </div>

                <div class="login-daftar">
                    <p>Belum punya akun ? <a href="/register">buat akun sekarang</a></p>
                </div>
            </form>
        </div>
    </div>
    @include('user.layouts.footer')
@endsection
