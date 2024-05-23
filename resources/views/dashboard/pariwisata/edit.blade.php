@extends('dashboard.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <h3 style="color: white">Edit Event</h3>
        <div class="card p-3 mb-3" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; ">
            <form action="/admin-pariwisata/{{ $pariwisatas->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row gap-3 p-3">
                    <div class="col col-lg-3 mb-3">
                        <label class="form-label">Gambar</label>
                        <div class="d-flex justify-content-start ">
                            <img src="{{ asset('storage/pariwisatas/' . $pariwisatas->image) }}"
                                style="height: 250px;object-fit: cover; width:230px;"
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
                                    placeholder="Sukses menjadi pengusaha" value="{{ $pariwisatas->nama_objek }}">
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
                                placeholder="Kiat untuk menjadi seorang pengusaha sukses ..." rows="7">{{ $pariwisatas->keterangan }}</textarea>
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
                                       placeholder="GOR H Agus Salim" value="{{ $pariwisatas->lokasi }}">
                                @error('lokasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>
                    
                        <button type="submit" style="float: right" class="btn btn-primary mt-3">Edit Pariwisata</button>
                        <a href="/admin-pariwisata" style="float: right" class="btn btn-secondary mt-3 me-3">Kembali</a>
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
