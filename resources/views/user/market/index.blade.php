@extends('user.layouts.index')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style_market.css') }}">
    <img src="" alt="">
    {{-- <div class="market-header"> --}}
    <div class="image-container "id="imageContainer">
        {{-- <div class="image-container"> --}}
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
        {{-- </div> --}}
    </div>
    <div class=" batas-kanan-kiri bawah">
        <div class="text ">
            <h1 class="kategori-produk" style="text-align: start; margin-bottom: 20px">Kategori Produk</h1>
        </div>
        <div class="kategori">
            <a href="/market" class="{{ Request::is('market') ? 'kategori-aktif' : '' }}">Semua</a>

            @foreach ($kategori_order as $item)
                <a href="/market-kategori/{{ $item->id }}"
                    class="{{ Request::is('market-kategori/' . $item->id) ? 'kategori-aktif' : '' }}">{{ $item->nama_kategori }}</a>
            @endforeach
        </div>
        <div class="text ">
            <h1 class="text-h1" style="text-align: start">Produk UMKM</h1>
        </div>
        {{-- <div class="teks-dan-slide atas-25px">
            @if ($produk_all->isNotEmpty())
                @if (request()->path() != 'market')
                    <h3>Produk {{ $produk_all->first()->kategori->nama_kategori }}</h3>
                @else
                    <h3>Semua Produk</h3>
                @endif
            @endif
            @if ($produk_all->count() >= 5)
                <div class="slide-buttons">
                    <button id="scrollLeftButton" class="slide-button"><i class="fa-solid fa-left-long"></i></button>
                    <button id="scrollRightButton" class a="slide-button"><i class="fa-solid fa-right-long"></i></button>
                </div>
            @endif
        </div>

        <div class="pembungkus-market ">
            @foreach ($produk_all as $item)
                <div class="kotak">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="">
                    <div class="text-kotak">
                        <h2>{{ Str::limit($item->nama_produk, 17, '...') }}</h2>
                        <p>{{ strip_tags(Str::limit($item->deskripsi_produk, 50, '...')) }}</p>
                    </div>
                    <a href="/market/detail-produk/{{ $item->id }}">Lihat detail produk</a>
                </div>
            @endforeach


        </div> --}}

        @foreach ($produk_kategori as $kategori_id => $produk)
            @php
                $kategori = $kategoris->firstWhere('id', $kategori_id);
            @endphp


            @if (request()->is('market-kategori/' . $kategori_id))
                <div class="teks-dan-slide">
                    <h3>{{ $kategori->nama_kategori }}</h3>
                    @if ($produk_all->count() >= 5)
                        <div class="slide-buttons">
                            <button id="scrollLeftButton" class="slide-button"><i
                                    class="fa-solid fa-left-long"></i></button>
                            <button id="scrollRightButton" class="slide-button"><i
                                    class="fa-solid fa-right-long"></i></button>
                        </div>
                    @endif
                </div>
                <div class="pembungkus-market ">
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
                <div class="teks-dan-slide ">
                    <h3>{{ $kategori->nama_kategori }}</h3>
                    @if ($produk->count() >= 5)
                        <div class="slide-buttons">
                            <button id="scrollLeftButton" class="slide-button"><i
                                    class="fa-solid fa-left-long"></i></button>
                            <button id="scrollRightButton" class a="slide-button"><i
                                    class="fa-solid fa-right-long"></i></button>
                        </div>
                    @endif
                </div>
                <div class="pembungkus-market ">

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
        });
        const carouselItems = document.querySelectorAll(".image-container-2");
        let i = 1;

        setInterval(() => {
            // Accessing All the carousel Items
            Array.from(carouselItems).forEach((item, index) => {

                if (i < carouselItems.length) {
                    item.style.transform = `translateX(-${i*100}%)`
                }
            })


            if (i < carouselItems.length) {
                i++;
            } else {
                i = 0;
            }
        }, 4000)


        // document.addEventListener("DOMContentLoaded", function() {
        //     const imageContainer = document.getElementById('imageContainer');
        //     let isDragging = false;
        //     let startX;

        //     imageContainer.addEventListener('mousedown', (e) => {
        //         isDragging = true;
        //         startX = e.clientX - imageContainer.scrollLeft;
        //         imageContainer.style.cursor = 'grabbing';
        //     });

        //     imageContainer.addEventListener('mouseup', () => {
        //         isDragging = false;
        //         imageContainer.style.cursor = 'grab';
        //     });

        //     imageContainer.addEventListener('mousemove', (e) => {
        //         if (!isDragging) return;
        //         const x = e.clientX - startX;
        //         imageContainer.scrollLeft = -x;
        //     });

        //     // Disable context menu to prevent right-click menu
        //     imageContainer.addEventListener('contextmenu', (e) => {
        //         e.preventDefault();
        //     });
        // });
    </script>

@endsection
