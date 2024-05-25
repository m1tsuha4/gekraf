@extends('user.layouts.index')
@section('content')
<link rel="stylesheet" href="{{ asset('css/style_article.css') }}">
<div class="article">
    <h1 style="">Contact</h1>
</div>
<div class="produk batas-kanan-kiri bawah atas">
    <div class="text">
        <div class="item3-2-1" style="text-align: center;">
            <a href="" style="display: block; margin-bottom: 10px;">
                <i class="fa-regular fa-envelope"></i> gekrafssumatrabarat@gmail.com
            </a>
            <a href="" style="display: block; margin-bottom: 10px;">
                <i class="fa-brands fa-instagram"></i> @gekrafs.sumbar
            </a>
            <a href="" style="display: block; margin-bottom: 10px;">
                <i class="fa-solid fa-location-dot"></i> DPW Gekraf Sumbar
            </a>
        </div>
    </div>

</div>

@include('user.layouts.footer')
@endsection
