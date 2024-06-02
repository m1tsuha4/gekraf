@extends('user.layouts.index')
@section('content')
    @include('sweetalert::alert')
    <link rel="stylesheet" href="{{ asset('css/style_user_produk_create.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <div class="formulir batas-kanan-kiri atas">
        <div class="text_produk">
            <h1>Form Tambah Produk</h1>
        </div>
        <form action="{{ route('user-pariwisata.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="isi-form" style="margin-bottom: 20px">
                <div class="gambar-produk">
                    <div class="cover-gambar-produk">
                        <img src="{{ asset('img/images.png') }}" class="img-preview" alt="">
                    </div>
                    <input class="form-control mt-3 @error('image') is-invalid @enderror" type="file" accept="image/*"
                        id="profil_image" name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="inputan">
                    <div class="baris">
                        <label for="">Nama Objek</label>
                        <input type="text" name="nama_objek" placeholder="Ngarai Sianok" value="{{ old('nama_objek') }}">
                        @error('nama_objek')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="baris">
                        <label for="keterangan">Keterangan</label>
                        <input id="keterangan" type="hidden" name="keterangan" value="{{ old('keterangan') }}">
                        <textarea rows="4" style="background-color: white" input="keterangan"
                            placeholder="Masukkan deskripsi produk anda disini ..." name="keterangan"></textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="sosial-media-produk">
                        <div class="baris">
                            <label for="">Lokasi</label>
                            <input type="text" name="lokasi" placeholder="" value="{{ old('lokasi') }}">
                            @error('lokasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="baris">
                            <label for="">Instagram</label>
                            <input type="text" name="instagram" placeholder="gekraf.sumbar" value="{{ old('instagram') }}">
                            @error('instagram')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sosial-media-produk">
                        <div class="baris">
                            <label for="latitude">Latitude</label>
                            <input type="text" id="latitude" name="latitude"
                                class="form-control @error('latitude') is-invalid @enderror" placeholder="-6.1751"
                                value="{{ old('latitude') }}">
                            @error('latitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="baris">
                            <label for="longitude">Longitude</label>
                            <input type="text" id="longitude" name="longitude"
                                class="form-control @error('longitude') is-invalid @enderror" placeholder="106.8650"
                                value="{{ old('longitude') }}">
                            @error('longitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Tambahkan elemen peta -->
                    <div id="map" style="height: 400px; width: 100%;"></div>

                    <div class="text-produk">
                        <a href="/user-pariwisata">Kembali</a>
                        <button type="submit">Tambah Produk</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/modal.js') }}"></script>
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

        // Initialize the map at the specified coordinates
        var map = L.map('map').setView([-0.95373000, 100.35199700], 13);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add a draggable marker at the specified coordinates
        var marker = L.marker([-0.95373000, 100.35199700], { draggable: true }).addTo(map);

        // Update latitude and longitude fields on marker drag
        marker.on('dragend', function(e) {
            var latlng = marker.getLatLng();
            document.getElementById('latitude').value = latlng.lat;
            document.getElementById('longitude').value = latlng.lng;
        });

        // Update marker position and map view on click
        map.on('click', function(e) {
            var latlng = e.latlng;
            marker.setLatLng(latlng);
            map.panTo(latlng);
            document.getElementById('latitude').value = latlng.lat;
            document.getElementById('longitude').value = latlng.lng;
        });
    </script>
@endsection
