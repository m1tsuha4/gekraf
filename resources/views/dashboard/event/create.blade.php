@extends('dashboard.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <h3 style="color: white">Tambah Event</h3>
        <div class="card p-3 mb-3" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; ">
            <form action="{{ route('admin-event.store') }}" method="post" enctype="multipart/form-data">
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
                                <label for="">Judul Event</label>
                                <input type="text" name="judul"
                                    class="form-control @error('judul')is-invalid @enderror"
                                    placeholder="Cinta Bangga Paham Rupiah" value="{{ old('judul') }}">
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="col pt-3">
                            <label for="">Deskripsi</label>
                            <textarea type="text" name="deskripsi" class="form-control @error('deskripsi')is-invalid @enderror"
                                placeholder="Kiat untuk menjadi seorang pengusaha sukses ..." rows="7">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Lokasi Event</label>
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
                        <div class="row mt-3">
                            <div class="col">
                                <label for="tanggal">Tanggal Event</label>
                                <input type="date" name="tanggal"
                                       class="form-control @error('tanggal')is-invalid @enderror"
                                       value="{{ old('tanggal') }}">
                                @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="waktu">Waktu Event</label>
                                <input type="time" name="waktu"
                                       class="form-control @error('waktu')is-invalid @enderror"
                                       value="{{ old('waktu') }}">
                                @error('waktu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" style="float: right" class="btn btn-primary mt-3">Tambah Event</button>
                        <a href="{{ route('admin-event.index') }}" style="float: right" class="btn btn-secondary mt-3 me-3">Kembali</a>
                    </div>
                </div>
            </form>
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
    </script>
@endsection
