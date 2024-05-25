@extends('user.layouts.index')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style_profile.css') }}">
    <div class="image-profile">
        <img src="{{ asset('img/home_profile.png') }}" alt="">
    </div>
    <div class="container">
        {{-- <div class="container">
            <img src="{{ asset('img/home_profile.png') }}" alt="">
        </div> --}}
        <div class="about-us batas-kanan-kiri atas bawah">
            <div class="gambar">
                <div class="cover-gambar">
                    <img src="{{ asset('img/Intersect.png') }}" alt="">
                </div>
            </div>
            <div class="text" style="margin-top: auto">
                <h2>Gerakan Ekonomi Kreatif</h2>
                <br>
                <br>
                <p>Gerakan Ekonomi Kreatif Nasional (GeKrafs) adalah sebuah organisasi komunitas dalam bidang pengembangan ekosistem ekonomi kreatif di Indonesia. GeKrafs digagas oleh Kawendra Lukistian, Sandiaga Uno, Erwin Soerjadi, Yanti Adeni, Laja Lapian, Ardian Perdana Putra dan beberapa pelaku industri kreatif lainnya di Jakarta pada 22 Januari 2019. </p>
            </div>
        </div>
    </div>

    @include('user.layouts.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
