@extends('dashboard.layouts.master')
@section('content')
    <div class="container">
        <h3 style="color: white">Edit Mentor</h3>
        <div class="card p-3 mb-3" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; ">
            <form action="/admin-mentor/{{ $mentors->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row gap-3 p-3">
                    <div class="col col-lg-3 mb-3">
                        <label class="form-label">Foto Profi</label>
                        <div class="d-flex justify-content-start ">
                            <img src="{{ asset('storage/' . $mentors->image) }}"
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
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control @error('nama')is-invalid @enderror"
                                    placeholder="rafli haikal" value="{{ $mentors->nama }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="inputState" class="form-label">Kategori Mentor</label>
                                <select class="form-select" name="kategori_mentor_id">
                                    @foreach ($kategoriMentor as $item)
                                        @if ($mentors->kategori_mentor_id == $item->id)
                                            <option value="{{ $item->id }}" selected>
                                                {{ $item->kategori_mentor }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id }}">
                                                {{ $item->kategori_mentor }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col pt-3">
                            <div class="col">
                                <label for="">Pekerjaan</label>
                                <input type="text" name="pekerjaan"
                                    class="form-control @error('pekerjaan')is-invalid @enderror"
                                    value="{{ $mentors->pekerjaan }}" placeholder="Desain Grafis PT.Tokopedia">
                                @error('pekerjaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label for="">Deskripsi</label>
                            <textarea type="text" name="deskripsi" class="form-control @error('deskripsi')is-invalid @enderror"
                                placeholder="Saya adalah seorang desain grafis ..." rows="3">{{ $mentors->deskripsi }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row pt-3">
                            <div class="col">
                                <label for="">No Whatsapp</label>
                                <input type="number" name="whatsapp"
                                    class="form-control @error('whatsapp')is-invalid @enderror"
                                    value="{{ $mentors->whatsapp }}" placeholder="0891234567810">
                                @error('whatsapp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="">Instagram</label>
                                <input type="text" name="instagram"
                                    class="form-control @error('instagram')is-invalid @enderror"
                                    value="{{ $mentors->instagram }}" placeholder="@rflihaikal">
                                @error('instagram')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col">
                                <label for="">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email')is-invalid @enderror" value="{{ $mentors->email }}"
                                    placeholder="rubik@gmail.com">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="">Alamat Lengkap</label>
                                <input type="text" name="alamat"
                                    class="form-control @error('alamat')is-invalid @enderror"
                                    placeholder="Jl. Merpati Putih, Padang, Sumatera Barat" value="{{ $mentors->alamat }}">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" style="float: right" class="btn btn-primary mt-3">Edit mentor</button>
                        <a href="/admin-mentor" style="float: right" class="btn btn-secondary mt-3 me-3">Kembali</a>
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
