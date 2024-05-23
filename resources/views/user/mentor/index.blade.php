@extends('user.layouts.index')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style_mentor.css') }}">
    <div class=" mentor batas-kanan-kiri bawah atas">
        <div class="text ">
            <h1 class="kategori-mentor" style="text-align: start">kategori Mentor Rubik</h1>
        </div>
        <div class="kategori">
            <a href="/mentor" class="{{ Request::is('mentor') ? 'kategori-aktif' : '' }}">Semua</a>

            @foreach ($kategori_mentor as $item)
                <a href="/mentor-kategori/{{ $item->id }}"
                    class="{{ Request::is('mentor-kategori/' . $item->id) ? 'kategori-aktif' : '' }}">{{ $item->kategori_mentor }}</a>
            @endforeach
        </div>
        <div class="text ">
            <h1 style="text-align: start">Mentor Rubik</h1>
        </div>
        <div class="pembungkus-mentor ">
            @foreach ($mentor_all as $item)
                <div class="kotak">
                    <div class="kotak-atas">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="">
                        <div class="text-kotak" style="text-align: center">
                            <h2>{{ $item->KategoriMentor->kategori_mentor }}</h2>
                            <p>{{ $item->nama }}</p>
                            {{-- <a href="/market/detail-produk/{{ $item->id }}">Lihat detail produk</a> --}}
                            <div class="profesi">
                                <p>{{ $item->pekerjaan }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="kotak-deskripsi">
                        <p>{{ $item->deskripsi }}</p>
                    </div>
                    <div class="medsos-mentor ">

                        <a class="tooltip" href="https://wa.me/{{ $item->whatsapp }}">
                            <span class="tooltiptext">{{ $item->whatsapp }}</span>
                            <i class="fa-brands fa-whatsapp"></i>Whatsapp </a>

                        <a class="tooltip" href="mailto:{{ $item->email }}">
                            <span class="tooltiptext">{{ $item->email }}</span>
                            <i class="fa-regular fa-envelope"></i>Email </a>
                        <a class="tooltip" href="">
                            @if ($item->instagram)
                                <span class="tooltiptext">{{ $item->instagram }}</span>
                            @endif
                            <i class="fa-brands fa-instagram"></i>Instagram
                        </a>
                        <a class="tooltip" href="#">
                            @if ($item->facebook)
                                <span class="tooltiptext">{{ $item->facebook }}</span>
                            @endif
                            <i class="fa-brands fa-facebook"></i>Facebook
                        </a>
                    </div>

                </div>
            @endforeach

        </div>

    </div>
    @include('user.layouts.footer')
@endsection
