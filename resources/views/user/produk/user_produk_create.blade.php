@extends('user.layouts.index')
@section('content')
    @include('sweetalert::alert')
    <link rel="stylesheet" href="{{ asset('css/style_user_produk_create.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <div class="formulir batas-kanan-kiri atas ">
        <div class="text_produk">
            <h1>Form Tambah Produk</h1>
        </div>
        <form action="/user-produk/create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="isi-form" style="margin-bottom: 20px">
                <input type="text" name="user_id"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('name') is_invalid @enderror"
                    value="{{ Auth::user()->id }}" style="display:none;">
                <div class="gambar-produk">
                    <div class="cover-gambar-produk">
                        <img src="{{ asset('img/images.png') }}" class="img-preview" alt="">
                    </div>
                    <input class="form-control mt-3  @error('image')is-invalid @enderror" type="file" accept="image/*"
                        id="profil_image" name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    {{-- <button id="myBtn" type="button">Open Modal</button>
                    <!-- The Modal -->
                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <p>Some text in the Modal..</p>
                        </div>

                    </div> --}}

                </div>


                <div class="inputan">
                    <div class="sosial-media-produk">

                        <div class="baris">
                            <label for="">Nama Produk</label>
                            <input type="text" name="nama_produk" placeholder="Sabun Sehat Sejati"
                                value="{{ old('nama_produk') }}">
                            @error('nama_produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="baris">

                            <label for="inputState" class="form-label">Kategori</label>
                            <select class="form-select" name="kategori_id">
                                @foreach ($kategoris as $item)
                                    @if (old('kategori_id') == $item->id)
                                        <option value="{{ $item->id }}" selected>
                                            {{ $item->nama_kategori }}
                                        </option>
                                    @else
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama_kategori }}
                                        </option>
                                    @endif
                                    <p>{{ $item->nama_kategori }}</p>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="baris">
                        <label for="deskripsi_produk">Deskripsi Produk</label>
                        <input id="deskripsi_produk" type="hidden" name="deskripsi_produk"
                            value="{{ old('deskripsi_produk') }}">
                        {{-- <trix-editor style="background-color: white" input="deskripsi_produk"
                            placeholder="Masukkan deskripsi produk anda disini ..."></trix-editor> --}}
                        <textarea rows="4" style="background-color: white" input="deskripsi_produk"
                            placeholder="Masukkan deskripsi produk anda disini ..." name="deskripsi_produk"></textarea>
                        @error('deskripsi_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sosial-media-produk">
                        <div class="baris">
                            <label for="">Whatsapp</label>
                            <input type="text" name="whatsapp" placeholder="0812345678910"
                                value="{{ old('whatsapp') }}">
                            @error('whatsapp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="baris">
                            <label for="">Email</label>
                            <input type="text" name="email" placeholder="rubik@gmail.com" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="sosial-media-produk">
                        <div class="baris">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" placeholder="Jl. Kacauu kacau"
                                value="{{ old('alamat') }}">
                        </div>
                        <div class="baris">
                            <label for="">Instagram</label>
                            <input type="text" name="instagram" placeholder="@rubik.academy"
                                value="{{ old('instagram') }}">
                        </div>
                    </div>
                    <div class="text-produk">
                        <a href="/user-produk">Kembali</a>
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
    </script>
@endsection
