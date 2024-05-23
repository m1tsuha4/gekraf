@extends('user.layouts.index')
@section('content')
    @include('sweetalert::alert')
    <link rel="stylesheet" href="{{ asset('css/style-user-profile.css') }}">
    <div class="formulir batas-kanan-kiri atas ">
        <div class="text_profile">
            <h1>Profil</h1>
        </div>
        <form action="user-profile/{{ $users->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="isi-form" style="margin-bottom: 20px">
                <div class="gambar-profile">
                    @if (Auth::user()->image)
                        <div class="cover-gambar-profile">
                            <img src="{{ asset('storage/user/' . $users->image) }}" class="img-preview" alt="">
                        </div>
                    @else
                        <div class="cover-gambar-profile">
                            <img src="{{ asset('img/images.png') }}" class="img-preview" alt="">
                        </div>
                    @endif

                    <input class="form-control mt-3  @error('image')is-invalid @enderror" type="file" accept="image/*"
                        id="profil_image" name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="inputan">
                    <div class="baris">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="name" class="@error('name') is-invalid @enderror"
                            value="{{ $users->name }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="baris">
                        <label for="">Whatsapp</label>
                        <input type="text" name="whatsapp" class="@error('whatsapp') is-invalid @enderror"
                            value="{{ $users->whatsapp }}">
                        @error('whatsapp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="baris">
                        <label for="">Email</label>
                        <input type="text" name="email" class="@error('email') is-invalid @enderror"
                            value="{{ $users->email }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- <div class="sosial-media-produk">
                        <div class="baris">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" placeholder="Jl. Kacauu kacau" value="{{ old('alamat') }}">
                        </div>
                        <div class="baris">
                            <label for="">Instagram</label>
                            <input type="text" name="instagram" placeholder="@rubik.academy"
                                value="{{ old('instagram') }}">
                        </div>
                    </div> --}}
                    <div class="text-profile">
                        <a href="/">Kembali</a>
                        <button type="submit">Edit Profile</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        function previewImage() {
            const image = document.querySelector('#profil_image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
