@extends('auth.layouts.auth-layouts')
@section('content')
<section
    class="d-flex justify-content-center align-items-center"
    id="daftar"
>
    <div class="container-fluid justify-content-center align-items-center">
        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @csrf  <!-- Include the CSRF token -->
            <div class="text-left">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="daftarForm">
                        <div class="col-md-12">
                            <div class="row mb-5 daftarHeader d-flex flex-row">
                                <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="Logo" />
                                <h1 class="w-50">Daftar Akun UMKM</h1>
                            </div>
        
                            <div class="row textForm">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="namaPemilik" class="form-label">No.Identitas Pemilik (NIK)</label>
                                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="namaPemilik" value="{{ old('nik') }}" />
                                        @error('nik')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="namaUsaha" class="form-label">NIB</label>
                                        <input type="text" name="nib" class="form-control @error('nib') is-invalid @enderror" id="namaUsaha" value="{{ old('nib') }}" />
                                        @error('nib')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row textForm">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="namaPemilik" class="form-label">Nama Pemilik</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="namaPemilik" value="{{ old('name') }}" />
                                        @error('name')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="namaUsaha" class="form-label">Nama Usaha</label>
                                        <input type="text" name="nama_usaha" class="form-control @error('nama_usaha') is-invalid @enderror" id="namaUsaha" value="{{ old('nama_usaha') }}" />
                                        @error('nama_usaha')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
        
                            <div class="row textForm">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat Pemilik</label>
                                        <input type="text" name="alamat_pemilik" class="form-control @error('alamat_pemilik') is-invalid @enderror" id="alamat" value="{{ old('alamat_pemilik') }}" />
                                        @error('alamat_pemilik')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat Usaha</label>
                                        <input type="text" name="alamat_usaha" class="form-control @error('alamat_usaha') is-invalid @enderror" id="alamat" value="{{ old('alamat_usaha') }}" />
                                        @error('alamat_usaha')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row textForm">
                                <div class="col-md-6">
                                    <label class="mb-2" for="asal">Kota</label>
                                    <select id="asal" name="id_kota" class="form-select form-select mb-3 @error('id_kota') is-invalid @enderror" aria-label="Large select example">
                                        <option selected>Open this select menu</option>
                                        @foreach($kotas as $kota)
                                            <option value="{{ $kota->id }}" {{ old('id_kota') == $kota->id ? 'selected' : '' }}>{{ $kota->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_kota')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="produkUsaha" class="form-label">Produk Usaha</label>
                                        <input type="text" name="produk_usaha" class="form-control @error('produk_usaha') is-invalid @enderror" id="produkUsaha" value="{{ old('produk_usaha') }}" />
                                        @error('produk_usaha')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 checkboxContainer">
                                    <div class="row textForm">
                                        <label for="">Sub Sektor Ekonomi Kreatif</label>
                                        <p>*Pilih satu atau lebih sub sektor usaha</p>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-md-3">
                                            <div class="form-check mb-2">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Aplikasi"
                                                    id="flexCheckDefault1"
                                                    name="sub_sektor[]"
                                                />
                                                <label class="form-check-label" for="flexCheckDefault1">
                                                    Aplikasi
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Desain Produk"
                                                    id="flexCheckDefault2"
                                                    name="sub_sektor[]"
                                                />
                                                <label class="form-check-label" for="flexCheckDefault2">
                                                    Desain Produk
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Kriya"
                                                    id="flexCheckDefault3"
                                                    name="sub_sektor[]"
                                                />
                                                <label class="form-check-label" for="flexCheckDefault3">
                                                    Kriya
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Periklanan"
                                                    id="flexCheckDefault4"
                                                    name="sub_sektor[]"
                                                />
                                                <label class="form-check-label" for="flexCheckDefault4">
                                                    Periklanan
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check mb-2">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Pengembangan Permainan"
                                                    id="flexCheckDefault5"
                                                    name="sub_sektor[]"
                                                />
                                                <label class="form-check-label" for="flexCheckDefault5">
                                                    Pengembangan Permainan
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Fashion"
                                                    id="flexCheckDefault6"
                                                    name="sub_sektor[]"
                                                />
                                                <label class="form-check-label" for="flexCheckDefault6">
                                                    Fashion
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Fotografi"
                                                    id="flexCheckDefault7"
                                                    name="sub_sektor[]"
                                                />
                                                <label class="form-check-label" for="flexCheckDefault7">
                                                    Fotografi
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Seni Pertunjukan"
                                                    id="flexCheckDefault8"
                                                    name="sub_sektor[]"
                                                />
                                                <label class="form-check-label" for="flexCheckDefault8">
                                                    Seni Pertunjukan
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check mb-2">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Arsitektur"
                                                    id="flexCheckDefault9"
                                                    name="sub_sektor[]"
                                                />
                                                <label class="form-check-label" for="flexCheckDefault9">
                                                    Arsitektur
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Film, Animasi, Video"
                                                    id="flexCheckDefault10"
                                                    name="sub_sektor[]"
                                                />
                                                <label class="form-check-label" for="flexCheckDefault10">
                                                    Film, Animasi, Video
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Musik"
                                                    id="flexCheckDefault11"
                                                    name="sub_sektor[]"
                                                />
                                                <label class="form-check-label" for="flexCheckDefault11">
                                                    Musik
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Seni Rupa"
                                                    id="flexCheckDefault12"
                                                    name="sub_sektor[]"
                                                />
                                                <label class="form-check-label" for="flexCheckDefault12">
                                                    Seni Rupa
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check mb-2">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Desain Komunikasi Visual"
                                                    id="flexCheckDefault13"
                                                    name="sub_sektor[]"
                                                />
                                                <label class="form-check-label" for="flexCheckDefault13">
                                                    Desain Komunikasi Visual
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Penerbitan"
                                                    id="flexCheckDefault14"
                                                    name="sub_sektor[]"
                                                />
                                                <label class="form-check-label" for="flexCheckDefault14">
                                                    Penerbitan
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Kuliner"
                                                    id="flexCheckDefault15"
                                                    name="sub_sektor[]"
                                                />
                                                <label class="form-check-label" for="flexCheckDefault15">
                                                    Kuliner
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Televisi dan Radio"
                                                    id="flexCheckDefault16"
                                                    name="sub_sektor[]"
                                                />
                                                <label class="form-check-label" for="flexCheckDefault16">
                                                    Televisi dan Radio
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('sub_sektor')
                                        <div class="invalid-feedback d-block">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row textForm">
                                <div class="mb-3">
                                    <label for="deskripsiUsaha" class="form-label">Deskripsi Usaha</label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsiUsaha" rows="5">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row textForm">
                                {{-- <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" />
                                    @error('email')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nomorHp" class="form-label">Nomor Handphone</label>
                                        <input type="number" name="whatsapp" class="form-control @error('whatsapp') is-invalid @enderror" id="nomorHp" value="{{ old('whatsapp') }}" />
                                        @error('whatsapp')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                  
                                <div class="col-md-6">
                                    <label class="mb-2" for="klasifikasi">Klasifikasi UMKM by Omzet</label>
                                    <select id="klasifikasi" name="klasifikasi" class="form-select form-select mb-3 @error('klasifikasi') is-invalid @enderror" aria-label="Large select example">
                                        <option selected>Open this select menu</option>
                                        <option value="mikro" {{ old('klasifikasi') }}>Mikro - ( Rp300Jt )</option>
                                        <option value="kecil" {{ old('klasifikasi') }}>Kecil - ( Rp300Jt - Rp2.5M )</option>
                                        <option value="menengah" {{ old('klasifikasi') }}>Menengah - ( Rp2.5M - Rp50M )</option>
                                    </select>
                                    @error('klasifikasi')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row textForm">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="instagram" class="form-label">Instagram</label>
                                        <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" id="instagram" value="{{ old('instagram') }}" />
                                        @error('instagram')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="facebook" class="form-label">Facebook</label>
                                        <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" id="facebook" value="{{ old('facebook') }}" />
                                        @error('facebook')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
        
                            <div class="row textForm">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="instagram" value="{{ old('email') }}" />
                                        @error('email')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" />
                                        @error('password')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 textForm">
                                <label class="mb-2" for="role">Daftar Sebagai</label>
                                <select id="role" name="role" class="form-select form-select mb-3 @error('role') is-invalid @enderror" aria-label="Large select example">
                                    <option selected>Open this select menu</option>
                                    <option value="umkm" {{ old('role') }}>UMKM</option>
                                    <option value="pokdarwis" {{ old('role') }}>Pokdarwis</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-primary btn-first">Selesai</button>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            
        </form>
    </div>
</section>
@endsection
