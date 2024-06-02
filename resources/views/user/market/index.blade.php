@extends('user.layouts.index')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style_market.css') }}">
    <img src="" alt="">
    <div class="image-container" id="imageContainer">
        <div class="image-container-2">
            <img src="img/market2.jpg" alt="">
        </div>
        <div class="image-container-2">
            <img src="img/Intersect (1).png" alt="">
        </div>
        <div class="image-container-2">
            <img src="img/market2.jpg" alt="">
        </div>
        <div class="image-container-2">
            <img src="img/Intersect (1).png" alt="">
        </div>
    </div>
    <div class="batas-kanan-kiri bawah">
        <div class="text">
            <h1 class="kategori-produk" style="text-align: start; margin-bottom: 20px">Kategori Produk</h1>
        </div>
        <div class="filter-container">
            <div class="kategori-container">
                <div class="kategori">
                    <a href="/market" class="{{ Request::is('market') ? 'kategori-aktif' : '' }}">Semua</a>
                    @foreach ($kategori_order as $item)
                        <a href="/market-kategori/{{ $item->id }}"
                            class="{{ Request::is('market-kategori/' . $item->id) ? 'kategori-aktif' : '' }}">{{ $item->nama_kategori }}</a>
                    @endforeach
                </div>
            </div>
            <h2>Filter Kota</h2>
            <div class="city-filter-container">
                <div class="city-filter">
                    <select id="cityFilter" class="city-filter-select">
                        <option value="/market" {{ Request::is('market') ? 'selected' : '' }}>Semua</option>
                        @foreach ($kotas as $kota)
                            <option value="/market-city/{{ $kota->id }}" {{ Request::is('market-city/' . $kota->id) ? 'selected' : '' }}>
                                {{ $kota->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="text">
            <h1 class="text-h1" style="text-align: start">Produk UMKM</h1>
        </div>

        @foreach ($produk_kategori as $kategori_id => $produk)
            @php
                $kategori = $kategoris->firstWhere('id', $kategori_id);
            @endphp

            @if (request()->is('market-kategori/' . $kategori_id))
                <div class="teks-dan-slide">
                    <h3>{{ $kategori->nama_kategori }}</h3>
                    @if ($produk_all->count() >= 5)
                        <div class="slide-buttons">
                            <button id="scrollLeftButton" class="slide-button"><i class="fa-solid fa-left-long"></i></button>
                            <button id="scrollRightButton" class="slide-button"><i class="fa-solid fa-right-long"></i></button>
                        </div>
                    @endif
                </div>
                <div class="pembungkus-market">
                    @foreach ($produk as $item)
                        <div class="kotak">
                            <img src="{{ asset('storage/produk/' . $item->image) }}" alt="">
                            <div class="text-kotak">
                                <h2>{{ Str::limit($item->nama_produk, 17, '...') }}</h2>
                                <p>{{ strip_tags(Str::limit($item->deskripsi_produk, 50, '...')) }}</p>
                            </div>
                            <a href="/market/detail-produk/{{ $item->id }}">Lihat detail produk</a>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach
        @if (request()->is('market'))
            @foreach ($produk_kategori as $kategori_id => $produk)
                @php
                    $kategori = $kategoris->firstWhere('id', $kategori_id);
                @endphp
                <div class="teks-dan-slide">
                    <h3>{{ $kategori->nama_kategori }}</h3>
                    @if ($produk->count() >= 5)
                        <div class="slide-buttons">
                            <button id="scrollLeftButton" class="slide-button"><i class="fa-solid fa-left-long"></i></button>
                            <button id="scrollRightButton" class="slide-button"><i class="fa-solid fa-right-long"></i></button>
                        </div>
                    @endif
                </div>
                <div class="pembungkus-market">
                    @foreach ($produk as $item)
                        <div class="kotak">
                            <img src="{{ asset('storage/produk/' . $item->image) }}" alt="">
                            <div class="text-kotak">
                                <h2>{{ Str::limit($item->nama_produk, 17, '...') }}</h2>
                                <p>{{ strip_tags(Str::limit($item->deskripsi_produk, 50, '...')) }}</p>
                            </div>
                            <a href="/market/detail-produk/{{ $item->id }}">Lihat detail produk</a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>
    @include('user.layouts.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const scrollStep = 290; // Jarak scroll per langkah (sesuaikan dengan kebutuhan Anda)

            $("#scrollRightButton").click(function() {
                $(".pembungkus-market").animate({
                    scrollLeft: "+=" + scrollStep
                }, 500); // Waktu animasi (ms)
            });

            $("#scrollLeftButton").click(function() {
                $(".pembungkus-market").animate({
                    scrollLeft: "-=" + scrollStep
                }, 500); // Waktu animasi (ms)
            });

            // Handle city filter change
            $("#cityFilter").change(function() {
                const selectedUrl = $(this).val();
                window.location.href = selectedUrl;
            });
        });

        const carouselItems = document.querySelectorAll(".image-container-2");
        let i = 1;

        setInterval(() => {
            Array.from(carouselItems).forEach((item, index) => {
                if (i < carouselItems.length) {
                    item.style.transform = `translateX(-${i*100}%)`
                }
            });

            if (i < carouselItems.length) {
                i++;
            } else {
                i = 0;
            }
        }, 4000);
    </script>

    <style>
        .filter-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .kategori-container,
        .city-filter-container {
            display: flex;
            overflow-x: auto;
            padding: 10px 0;
        }
        .kategori,
        .city-filter {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            width: 100%;
        }
        .kategori a,
        .city-filter select {
            flex: 0 0 auto;
            padding: 10px 20px;
            background: #f1f1f1;
            text-decoration: none;
            color: #333;
            border-radius: 5px;
            white-space: nowrap;
        }
        .kategori a.kategori-aktif {
            background: #007bff;
            color: white;
        }
 
        .teks-dan-slide {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .pembungkus-market {
            display: flex;
            overflow-x: auto;
            gap: 20px;
        }
        .pembungkus-market .kotak {
            flex: 0 0 auto;
            width: 200px;
        }
        .slide-buttons {
            display: flex;
            gap: 10px;
        }
        .slide-button {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
@endsection
