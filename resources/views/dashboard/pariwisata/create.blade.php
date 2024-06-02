@extends('dashboard.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <div class="container">
        <h3 style="color: white">Tambah Pariwisata</h3>
        <div class="card p-3 mb-3" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; ">
            <form action="{{ route('admin-pariwisata.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row gap-3 p-3">
                    <div class="col col-lg-3 mb-3">
                        <label class="form-label">Gambar</label>
                        <div class="d-flex justify-content-start ">
                            <img src="/img/images.png" style="height: 250px;object-fit: cover; width:230px;"
                                class="img-preview  rounded border border-5 border-white shadow"alt="">
                        </div>
                        <div class="col ">
                            <input class="form-control mt-3  @error('image')is-invalid @enderror" type="file"
                                accept="image/*" id="profil_image" name="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col ">
                        <div class="row">
                            <div class="col">
                                <label for="">Nama Objek</label>
                                <input type="text" name="nama_objek"
                                    class="form-control @error('nama_objek')is-invalid @enderror"
                                    placeholder="Cinta Bangga Paham Rupiah" value="{{ old('nama_objek') }}">
                                @error('nama_objek')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col pt-3">
                            <label for="">Keterangan</label>
                            <textarea type="text" name="keterangan" class="form-control @error('keterangan')is-invalid @enderror"
                                placeholder="Kiat untuk menjadi seorang pengusaha sukses ..." rows="7">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <label for="">Lokasi</label>
                                <input type="text" name="lokasi"
                                       class="form-control @error('lokasi')is-invalid @enderror"
                                       placeholder="GOR H Agus Salim" value="{{ old('lokasi') }}">
                                @error('lokasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="">Instagram</label>
                                <input type="text" name="instagram"
                                       class="form-control @error('instagram')is-invalid @enderror"
                                       placeholder="gekraf.sumbar" value="{{ old('instagram') }}">
                                @error('instagram')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col">
                                <label for="latitude">Latitude</label>
                                <input type="text" id="latitude" name="latitude" class="form-control @error('latitude')is-invalid @enderror"
                                       placeholder="-6.1751" value="{{ old('latitude') }}">
                                @error('latitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="longitude">Longitude</label>
                                <input type="text" id="longitude" name="longitude" class="form-control @error('longitude')is-invalid @enderror"
                                       placeholder="106.8650" value="{{ old('longitude') }}">
                                @error('longitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
        
                        <button type="submit" style="float: right" class="btn btn-primary mt-3">Tambah Pariwisata</button>
                        <a href="{{ route('admin-pariwisata.index') }}" style="float: right" class="btn btn-secondary mt-3 me-3">Kembali</a>
                    </div>
                </div>
            </form>
            <div id="map" style="height: 400px; width: 100%;" class="mt-3"></div>
        </div>
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

        // Initialize the map at the specified coordinates
        var map = L.map('map').setView([-0.95373000, 100.35199700], 13);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add a draggable marker at the specified coordinates
        var marker = L.marker([-0.95373000, 100.35199700], {draggable: true}).addTo(map);

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
