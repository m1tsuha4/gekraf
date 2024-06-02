@extends('user.layouts.index')
@section('content')
<link rel="stylesheet" href="{{ asset('css/style_article.css') }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<div class="article">
    <h1 style="">E - Journey</h1>
</div>
    <div class="produk batas-kanan-kiri bawah">
        <div class="pembungkus-2 " style="margin-top:50px">
            @foreach ($pariwisatas as $item)
                <div class="kotak">
                    <img src="{{ asset('storage/pariwisatas/' . $item->image) }}" alt="">
                    <div class="text-kotak">
                        <h2>{{ ($item->nama_objek) }}</h2>
                        <p>{{ Str::limit($item->keterangan, 100, '...') }}</p>
                        <br>
                        <p><i class="fa-solid fa-location-dot"></i>  {{ $item->lokasi }}</p>
                        <p><i class="fa-brands fa-instagram"></i>  {{ $item->instagram }}</p>
                    </div>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#eventModal{{ $item->id }}">Lihat Event</a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="eventModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $item->nama_objek }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage/pariwisatas/' . $item->image) }}" alt="" class="img-fluid mb-3">
                                <p class="info-item">{{ $item->keterangan }}</p>
                                <p class="info-item"><i class="fa-solid fa-location-dot"></i>  {{ $item->lokasi }}</p>
                                <p class="info-item"><i class="fa-brands fa-instagram"></i>  {{ $item->instagram }}</p>
                                <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" 
                                    class="btn btn-primary btn-sm" target="_blank">Google Maps</a>
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
