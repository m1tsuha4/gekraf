@extends('user.layouts.index')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style_market.css') }}">
    <div class="produk batas-kanan-kiri bawah atas">

        <div class="text ">
            <h1 style="">Artikel</h1>
        </div>
        <div class="pembungkus-2 ">
            @foreach ($artikels as $item)
                <div class="kotak">
                    <img src="{{ asset('storage/articles/' . $item->image) }}" alt="">
                    <div class="text-kotak">
                        <h2>{{ Str::limit($item->judul, 19, '...') }}</h2>
                        <p>{{ Str::limit($item->deskripsi, 40, '...') }}</p>
                    </div>
                    <a href="#">Lihat Artikel</a>
                </div>
            @endforeach

        </div>

    </div>
    @include('user.layouts.footer')
@endsection
