@extends('user.layouts.index')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style_user_produk.css') }}">
    @include('sweetalert::alert')
    <div class="produk batas-kanan-kiri bawah atas">
        <div class="text ">
            <h1 style="text-align: start">E - Journey</h1>
        </div>
        <div class="text tambahan-button" style="margin-bottom: 20px;">
            <a href="/user-pariwisata/create">Tambah Journey</a>
        </div>
        <div class="pembungkus-2 ">
            @foreach ($pariwisatas as $item)
                <div class="kotak">
                    <img src="{{ asset('storage/pariwisatas/' . $item->image) }}" alt="">
                    <div class="text-kotak">
                        <h2>{{ ($item->nama_objek) }}</h2>
                        <p>{{ Str::limit($item->keterangan, 100, '...') }}</p>
                    </div>
                    <div class="produk-tombol">
                        <a class="" href="/user-pariwisata/{{ $item->id }}/edit">
                            <i class="fa-solid fa-pen"></i></a>

                        <a href="" style="background-color: rgb(245, 54, 92)">
                            <form id="hapus" action="/user-pariwisata/{{ $item->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('hapus {{ $item->nama_objek }} ?')"
                                    class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection
