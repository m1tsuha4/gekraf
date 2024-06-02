@extends('dashboard.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <h3 style="color: white">Edit Produk</h3>
        <div class="card p-3 mb-3" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <form action="/user-produk/{{ $produks->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                <div class="row gap-3 p-3">
                    <div class="col col-lg-3 mb-3">
                        <label class="form-label">Gambar</label>
                        <div class="d-flex justify-content-start">
                            <img src="{{ asset('storage/produk/' . $produks->image) }}" 
                                style="height: 250px;object-fit: cover; width:230px;"
                                class="img-preview rounded border border-5 border-white shadow" alt="">
                        </div>
                        <div class="col">
                            <input class="form-control mt-3 @error('image')is-invalid @enderror" type="file"
                                   accept="image/*" id="profil_image" name="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="row mt-3">
                            <div class="col">
                                <label for="tanggal">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control @error('nama_produk')is-invalid @enderror" value="{{ $produks->nama_produk }}">
                                @error('nama_produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="waktu">Sub Sektor</label>
                                <select class="form-select" name="kategori_id" @error('kategori_id') is-invalid @enderror">
                                    @foreach ($kategoris as $item)
                                        <option value="{{ $item->id }}" {{ $produks->kategori_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="tanggal">Jenis Produk</label>
                                <input type="text" name="jenis_produk" class="form-control @error('jenis_produk')is-invalid @enderror" value="{{ $produks->jenis_produk }}">
                                @error('jenis_produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="waktu">Harga</label>
                                <input type="text" name="harga" placeholder="50.000" class="form-control @error('harga')is-invalid @enderror" value="{{ $produks->harga }}">
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="tanggal">File (NIB, PIRT, BPOM, Halal)</label>
                                <input type="file" name="pdf" class="form-control @error('pdf')is-invalid @enderror">
                                @error('pdf')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                @if ($produks->pdf)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/produk/pdf/' . $produks->pdf) }}" target="_blank">Lihat file yang sudah diunggah</a>
                                    </div>
                                @endif
                            </div>

                            <div class="col">
                                <label class="mb-2" for="asal">Kota</label>
                                <select id="asal" name="id_kota" class="form-select form-select mb-3 @error('id_kota') is-invalid @enderror">
                                    @foreach($kotas as $kota)
                                        <option value="{{ $kota->id }}" {{ $produks->id_kota == $kota->id ? 'selected' : '' }}>{{ $kota->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_kota')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col pt-3">
                            <label for="">Deskripsi Produk</label>
                            <textarea name="deskripsi_produk" class="form-control @error('deskripsi_produk')is-invalid @enderror" placeholder="Kiat untuk menjadi seorang pengusaha sukses ..." rows="7">{{ $produks->deskripsi_produk }}</textarea>
                            @error('deskripsi_produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="">Whatsapp</label>
                                <input type="text" name="whatsapp" class="form-control @error('whatsapp')is-invalid @enderror" placeholder="0812345678910" value="{{ $produks->whatsapp }}">
                                @error('whatsapp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" class="form-control @error('alamat')is-invalid @enderror" placeholder="Jl. Kacauu kacau" value="{{ $produks->alamat }}">
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <label for="tanggal">Email</label>
                                <input type="text" name="email" class="form-control @error('email')is-invalid @enderror" value="{{ $produks->email }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="waktu">Instagram</label>
                                <input type="text" name="instagram" class="form-control @error('instagram')is-invalid @enderror" value="{{ $produks->instagram }}">
                                @error('instagram')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" style="float: right" class="btn btn-primary mt-3">Edit Produk</button>
                        <a href="/admin-produk" style="float: right" class="btn btn-secondary mt-3 me-3">Kembali</a>
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
