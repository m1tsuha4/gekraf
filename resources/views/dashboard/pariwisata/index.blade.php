@extends('dashboard.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div id="toast-container" class="toast-top-right"></div>

        <a href="{{ route('admin-pariwisata.create') }}" class="btn btn-success">Tambah Pariwisata</a>
        <div class="row mb-3">
            @foreach ($pariwisatas as $item)
                <div class="col-3 align-items-start">
                    <div class="card"
                        style="width: calc(100/4);box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;margin-bottom: 10px;">
                        <img src="{{ asset('storage/pariwisatas/' . $item->image) }}"
                            style="height: 15rem; object-fit: cover;padding:3px" class="card-img-top" alt="...">
                        <div class="card-body p-3">
                            <p class="card-text" style="font-weight: bold;">{{ $item->nama_objek }}</p>
                            {{-- <p class="card-text">{{ $item->excerpt }}</p> --}}
                            <div class="d-flex " style="gap:3px">
                                <a href="#" class="btn btn-secondary btn-sm"
                                    style="padding: 8px 28px;margin:0px 0px 3px 0px;" data-bs-toggle="modal"
                                    data-bs-target="#showmodal{{ $item->id }}"><i class="fa-solid fa-eye"></i></a>


                                <a href="/admin-pariwisata/{{ $item->id }}/edit" class="btn btn-primary btn-sm "
                                    style="padding: 8px 28px;margin:0px 0px 3px 0px; ">
                                    <i class="fa-solid fa-pen"></i></a>


                                <form action="/admin-pariwisata/{{ $item->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('hapus event ?')"
                                        class="btn btn-danger btn-sm" style="padding: 8px 28px;margin:0px 0px 3px 0px;"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Modal-show-kategori -->
        @foreach ($pariwisatas as $item)
            <div class="modal fade" id="showmodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Pariwisata</h1>

                            <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"
                                style="cursor: pointer"></i>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">


                                <div class="d-flex " style="justify-content: center;">
                                    <img src="{{ asset('storage/pariwisatas/' . $item->image) }}"
                                        style="height: 400px;object-fit: cover; width:100%;"
                                        class="img-preview  rounded border border-5 border-white shadow"alt="">
                                </div>

                                <h3 class="mt-3" style="text-align: center">{{ $item->nama_objek }}</h3>
                                <p class="mt-3" style="text-align: justify">{{ $item->keterangan }}</p>
                                <p class="mt-3" style="text-align: justify">Lokasi : {{ $item->lokasi }}</p>
                
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>

                        </div>

                    </div>
                </div>
            </div>
    </div>
    @endforeach
    </div>
@endsection
