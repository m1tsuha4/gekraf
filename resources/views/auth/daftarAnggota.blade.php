@extends('auth.layouts.auth-layouts')
@section('content')
    <section class="d-flex justify-content-center align-items-center" id="daftar">
        <div class="container-fluid d-flex justify-content-center align-items-center">
            <form action="{{ route('daftarAnggota') }}" method="post" enctype="multipart/form-data">
                @csrf  <!-- Include the CSRF token -->
                <div class="row daftarForm">
                    <div class="col-md-12">
                        <div class="row mb-5 daftarHeader d-flex flex-row">
                            <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="" />
                            <h1 class="w-50">Daftar Anggota Gekraf</h1>
                        </div>
                        <div class="row textForm">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Foto Diri</label>
                                    <div class="custom-file-upload" onclick="document.getElementById('formFile').click();">
                                        <div></div>
                                        <img id="uploadPreview" src="" alt="Upload Preview" style="display:none;">
                                        <div class="text-center" id="uploadText">
                                            <img class="mb-2" src="{{ asset('img/addFoto.png') }}" alt="">
                                            <p class="upload-text">Klik Browse Untuk <br> Memasukkan Foto Diri</p>
                                        </div>
                                        <input class="form-control" name="image" type="file" id="formFile" onchange="previewFile()">
                                        <button class="btn w-100 btn-primary btn-first" type="button">Upload</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 d-flex justify-content-between flex-column">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="nik" class="form-label">NIK (Nomor Induk Penduduk)</label>
                                        <input type="text" name="nik" class="form-control" id="nik" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="produkUsaha" class="form-label">Produk Usaha</label>
                                        <input type="text" name="nama_usaha" class="form-control" id="produkUsaha" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row formText">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-2" for="asal">Asal DPC</label>
                                <select id="asal" name="id_kota" class="form-select form-select mb-3" aria-label="Large select example">
                                    <option selected>Open this select menu</option>
                                    @foreach($kotas as $kota)
                                        <option value="{{ $kota->id }}">{{ $kota->nama }}</option>
                                    @endforeach
                                </select>
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
                                <div class="row">
                                    <button class="btn btn-primary btn-first" type="submit">Selesai</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script>
        function previewFile() {
            const file = document.getElementById('formFile').files[0];
            const preview = document.getElementById('uploadPreview');
            const uploadText = document.getElementById('uploadText');
            const reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
                uploadText.style.display = 'none';
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.style.display = 'none';
                uploadText.style.display = 'block';
            }
        }
    </script>
@endsection
