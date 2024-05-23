@extends('user.layouts.index')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style_market.css') }}">
    <div class="produk batas-kanan-kiri bawah atas">

        <div class="text ">
            <h1 style="">Event</h1>
        </div>
        <div class="pembungkus-2 ">
            @foreach ($events as $item)
                <div class="kotak">
                    <img src="{{ asset('storage/events/' . $item->image) }}" alt="">
                    <div class="text-kotak">
                        <h2>{{ Str::limit($item->judul, 19, '...') }}</h2>
                        <p>{{ Str::limit($item->deskripsi, 100, '...') }}</p>
                        <br>
                        <p><i class="fa-solid fa-location-dot"></i>  {{ $item->lokasi }}</p>
                        <p><i class="fa-regular fa-calendar"></i>  {{ $item->tanggal }}</p>
                        <p><i class="fa-regular fa-clock"></i>  {{ $item->waktu }}</p>
                    </div>
                    <a href="#">Lihat Event</a>
                </div>
            @endforeach

        </div>

    </div>
    @include('user.layouts.footer')
@endsection
