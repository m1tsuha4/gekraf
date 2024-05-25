@extends('user.layouts.index')
@section('content')
    @include('sweetalert::alert')
    <div class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/landingpage.png') }}" alt="Image 1">
                <div class="carousel-caption">
                    <img class="insert-caption" src="{{ asset('img/Group 2.png') }}" alt="">
                    <h1 class="insert-caption" style="margin-top: 10px;">Membantu UMKM Lebih Maju</h1>
                    <p class="insert-caption" style="margin-top: 10px;">Menyediakan berbagai kebutuhan untuk meningkatkan sumber daya manusia dan memajukan UMKM daerah agar bisa go internasional </p>
                    <div class="text" style="text-align: left; margin-top:50px">
                        <a href="/daftar-anggota">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/landingpage.png') }}" alt="Image 2">
                <div class="carousel-caption">
                    <img src="{{ asset('img/Group 2.png') }}" alt="">
                    <h1 style="margin-top: 10px;">Membantu UMKM Lebih Maju</h1>
                    <p style="margin-top: 10px;">Menyediakan berbagai kebutuhan untuk meningkatkan sumber daya manusia dan memajukan UMKM daerah agar bisa go internasional </p>
                    <div class="text" style="text-align: left; margin-top:50px">
                        <a href="/daftar-anggota">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/landingpage.png') }}" alt="Image 3">
                <div class="carousel-caption">
                    <img src="{{ asset('img/Group 2.png') }}" alt="">
                    <h1 style="margin-top: 10px;">Membantu UMKM Lebih Maju</h1>
                    <p style="margin-top: 10px;">Menyediakan berbagai kebutuhan untuk meningkatkan sumber daya manusia dan memajukan UMKM daerah agar bisa go internasional </p>
                    <div class="text" style="text-align: left; margin-top:50px">
                        <a href="/daftar-anggota">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control prev" onclick="prevSlide()">&#10094;</button>
        <button class="carousel-control next" onclick="nextSlide()">&#10095;</button>
    </div>
    
    

    <div class="container">
        <div class="about-us batas-kanan-kiri atas bawah">
            <div class="gambar">
                <div class="cover-gambar">
                    <img src="{{ asset('img/dpw.png') }}" alt="">
                </div>
            </div>
            <div class="text" style="margin-top: auto">
                <h1>Siapa Kami ?</h1>
                <br>
                <br>
                <p>Gerakan Ekonomi Kreatif Nasional (GeKrafs) adalah sebuah organisasi komunitas dalam bidang pengembangan ekosistem ekonomi kreatif di Indonesia. GeKrafs digagas oleh Kawendra Lukistian, Sandiaga Uno, Erwin Soerjadi, Yanti Adeni, Laja Lapian, Ardian Perdana Putra dan beberapa pelaku industri kreatif lainnya di Jakarta pada 22 Januari 2019. </p>

            </div>
        </div>
    </div>
        <div class="artikel batas-kanan-kiri">
            <div class="text">
                <h1>Acara Kami</h1>
            </div>
            <div class="pembungkus-2 " style="margin-top:50px">
                @foreach ($events as $item)
                    <div class="kotak">
                        <img src="{{ asset('storage/events/'. $item->image) }}" alt="Event Image">
                        <div class="text-kotak">
                            <h2>{{ Str::limit($item->judul, 25, '...') }}</h2>
                            <p>{{ $item->excerpt }}</p>
                            <br>
                            <p><i class="fa-solid fa-location-dot"></i>  {{ $item->lokasi }}</p>
                            <p><i class="fa-regular fa-calendar"></i>  {{ $item->tanggal }}</p>
                            <p><i class="fa-regular fa-clock"></i>  {{ $item->waktu }}</p>
                        </div>
{{--                            <a href="">Selengkapnya</a>--}}


                    </div>
                @endforeach

            </div>
            <div class="text" style="text-align: center; margin-top:50px">
                <a href="/event">Selengkapnya</a>
            </div>
        </div>

        <div class="artikel batas-kanan-kiri atas bawah">
            <div class="text">
                <h1>Pariwisata</h1>
            </div>
            <div class="pembungkus-2 " style="margin-top:50px">
                @foreach ($pariwisatas as $item)
                    <div class="kotak">
                        <img src="{{ asset('storage/pariwisatas/'. $item->image) }}" alt="Event Image">
                        <div class="text-kotak">
                            <h2>{{ Str::limit($item->nama_objek, 25, '...') }}</h2>
                            <p>{{ $item->keterangan }}</p>
                            <br>
                            <p><i class="fa-solid fa-location-dot"></i>  {{ $item->lokasi }}</p>
                            
                        </div>
                        {{--                            <a href="">Selengkapnya</a>--}}


                    </div>
                @endforeach

            </div>
        </div>
        <div class="location">

        </div>

        @include('user.layouts.footer')

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            let currentSlide = 0;
            const totalSlides = document.querySelectorAll('.carousel-item').length;
        
            function showSlide(index) {
                const slides = document.querySelectorAll('.carousel-item');
                currentSlide = (index + totalSlides) % totalSlides; // Menambahkan totalSlides untuk menangani nilai negatif
                document.querySelector('.carousel-inner').style.transform = `translateX(${-currentSlide * 100}%)`;
            }
        
            function nextSlide() {
                showSlide(currentSlide + 1);
            }
        
            function prevSlide() {
                showSlide(currentSlide - 1);
            }
        
            // Auto play carousel
            setInterval(() => {
                nextSlide();
            }, 5000); // Ganti angka 5000 dengan durasi waktu yang diinginkan (dalam milidetik)
        </script>
        
    @endsection
