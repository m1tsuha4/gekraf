@extends('user.layouts.index')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style_detail_produk.css') }}">

    <div class="detail-produk batas-kanan-kiri atas bawah">
        <div class="item-detail-produk">
            <div class="gambar-detail-produk">
                <img src="{{ asset('storage/produk/' . $produks->image) }}" alt="">
                <div class="judul-sosial-media-produk">
                    <p class="text-tebal">Sosial Media :</p>
                </div>
                <div class="sosial-media-detail-produk">
                    <a href="https://wa.me/{{ $produks->whatsapp }}"><i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a href="mailto:{{ $produks->email }}"><i class="fa-regular fa-envelope"></i> </a>
                    <a href="https://instagram.com/{{ preg_replace('/[^a-zA-Z]/', '', $produks->instagram) }}"><i
                            class="fa-brands fa-instagram"></i> </a>
                </div>
            </div>
            <div class="text-detail-produk">
                <div class="owner-detail-produk">
                    <p class="text-tebal">Owner Produk : </p>
                    <p> {{ $produks->user->name }} </p>
                </div>
                <div class="judul-detail-produk">
                    <h1>{{ $produks->nama_produk }} </h1>
                    <p> Rp.{{ $produks->harga }},00</p>
                </div>
                <hr>
                <div class="deskripsi-detail-produk">
                    <p class="text-tebal">Jenis Produk :</p>
                    <p>{!! $produks->jenis_produk !!}</p>
                </div>
                <hr>
                <div class="deskripsi-detail-produk">
                    <p class="text-tebal">Deskripsi : </p>
                    <p> {!! $produks->deskripsi_produk !!}</p>
                </div>
                <hr>
                <div class="alamat-detail-produk">
                    <p class="text-tebal">Kota : </p>
                    <p>{{ $nama_kota->nama_kota }}</p>
                </div>
                <hr>
                <div class="alamat-detail-produk">
                    <p class="text-tebal">Alamat : </p>
                    <p>{{ $produks->alamat }}</p>
                </div>

                <div class="beli-detail-produk">
                    <a href="https://wa.me/{{ $produks->whatsapp }}">Hubungi Penjual</a>
                </div>

            </div>
        </div>
        {{-- <form method="POST" action="/process">
            @csrf
            <div id="dynamic-inputs">
                <!-- Input dinamis akan ditambahkan di sini -->
            </div>
            <button id="add-input" type="button">Tambah Input</button>
            <button id="remove-input" type="button">Hapus Input</button>
            <button type="submit">Kirim</button>
        </form> --}}

    </div>



    @include('user.layouts.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#add-input').click(function() {
                // Tambahkan input baru
                $('#dynamic-inputs').append('<input type="text" name="dynamic_input[]">');
            });

            $('#remove-input').click(function() {
                // Hapus input terakhir
                $('#dynamic-inputs input:last').remove();
            });
        });
    </script>
@endsection
