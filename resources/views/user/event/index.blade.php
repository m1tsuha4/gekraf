@extends('user.layouts.index')
@section('content')
<link rel="stylesheet" href="{{ asset('css/style_article.css') }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<div class="article">
    <h1 style="">Event</h1>
</div>
    <div class="produk batas-kanan-kiri bawah atas">
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
                    <a href="#" data-bs-toggle="modal" data-bs-target="#eventModal{{ $item->id }}">Lihat Event</a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="eventModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $item->judul }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage/events/' . $item->image) }}" alt="" class="img-fluid mb-3">
                                <p class="info-item">{{ $item->deskripsi }}</p>
                                <p class="info-item"><i class="fa-solid fa-location-dot"></i>  {{ $item->lokasi }}</p>
                                <p class="info-item"><i class="fa-regular fa-calendar"></i>  {{ $item->tanggal }}</p>
                                <p class="info-item"><i class="fa-regular fa-clock"></i>  {{ $item->waktu }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
    @include('user.layouts.footer')
@endsection
