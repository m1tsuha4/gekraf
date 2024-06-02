@extends('dashboard.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div id="toast-container" class="toast-top-right"></div>

        <a href="{{ route('admin-pariwisata.create') }}" class="btn btn-success mb-3">Tambah Pariwisata</a>
        <div class="row mb-3">
            @foreach ($pariwisatas as $item)
                <div class="col-3 align-items-start">
                    <div class="card"
                        style="width: 100%; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; margin-bottom: 10px;">
                        <img src="{{ asset('storage/pariwisatas/' . $item->image) }}"
                            style="height: 15rem; object-fit: cover; padding: 3px;" class="card-img-top" alt="{{ $item->nama_objek }}">
                        <div class="card-body p-3">
                            <p class="card-text font-weight-bold">{{ $item->nama_objek }}</p>
                            <div class="d-flex" style="gap: 3px;">
                                <a href="#" class="btn btn-secondary btn-sm" style="padding: 8px 28px;" data-bs-toggle="modal"
                                    data-bs-target="#showmodal{{ $item->id }}"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('admin-pariwisata.edit', $item->id) }}" class="btn btn-primary btn-sm" 
                                    style="padding: 8px 28px;"><i class="fa-solid fa-pen"></i></a>
                                <form action="{{ route('admin-pariwisata.destroy', $item->id) }}" method="POST" 
                                      onsubmit="return confirm('Hapus pariwisata?');" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="padding: 8px 28px;">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Modal Show Pariwisata -->
        @foreach ($pariwisatas as $item)
            <div class="modal fade" id="showmodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Pariwisata</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 d-flex justify-content-center">
                                <img src="{{ asset('storage/pariwisatas/' . $item->image) }}" style="height: 400px; object-fit: cover; width: 100%;" 
                                     class="img-preview rounded border border-5 border-white shadow" alt="{{ $item->nama_objek }}">
                            </div>
                            <h3 class="mt-3 text-center">{{ $item->nama_objek }}</h3>
                            <p class="mt-3 text-justify">{{ $item->keterangan }}</p>
                            <p class="mt-3 text-justify">Instagram: {{ $item->instagram }}</p>
                            <p class="mt-3 text-justify">Lokasi: {{ $item->lokasi }}</p>
                            <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" 
                                class="btn btn-primary btn-sm" target="_blank">Google Maps</a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
