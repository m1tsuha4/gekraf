@extends('user.layouts.index')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style_user_produk.css') }}">
    @include('sweetalert::alert')
    <div class="produk batas-kanan-kiri bawah atas">
        <div class="text ">
            <h1 style="text-align: start">Produk Anda di Market UMKM Rubik</h1>
        </div>
        <div class="text tambahan-button" style="margin-bottom: 20px;">
            <a href="/user-produk/create">Tambah Produk</a>
        </div>
        <div class="pembungkus-2 ">
            @foreach ($produks as $item)
                <div class="kotak">
                    <img src="{{ asset('storage/produk/' . $item->image) }}" alt="">
                    <div class="text-kotak">
                        <h2>{{ Str::limit($item->nama_produk, 19, '...') }}</h2>
                        <p>{!! $item->excerpt !!}</p>
                    </div>
                    <div class="produk-tombol">
                        <a class="" href="/user-produk/{{ $item->id }}/edit">
                            <i class="fa-solid fa-pen"></i></a>

                        <a href="" style="background-color: rgb(245, 54, 92)">
                            <form id="hapus" action="/user-produk/{{ $item->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('hapus {{ $item->nama_produk }} ?')"
                                    class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection
