@extends('dashboard.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div id="toast-container" class="toast-top-right"></div>

        <h3 style="color: white">Anggota Gekraf</h3>

        <div class="row mb-3">
            @foreach ($anggotas as $item)
                <div class="col-3 align-items-start">
                    <div class="card text-center" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;margin-bottom: 10px;">
                        @if ($item->image)
                            <img src="{{ asset('storage/dataGekraf/' . $item->image) }}"
                                style="height: 10rem; object-fit: cover;padding:3px" class="card-img-top" alt="...">
                        @else
                            <img src="/img/images.png" style="height: 10rem; object-fit: cover;padding:3px"
                                class="card-img-top" alt="...">
                        @endif
                        <div class="card-body p-3">
                            <p class="card-text" style="font-weight: bold;">{{ $item->nama }}</p>
                            <p class="card-text">{{ $item->nik }}</p>
                            <div class="d-flex " style="gap:3px;text-align:center;justify-content:center">
                                <a href="#" class="btn btn-secondary btn-sm"
                                    style="padding: 8px 28px;margin:0px 0px 3px 0px;" data-bs-toggle="modal"
                                    data-bs-target="#showmodal{{ $item->id }}"><i class="fa-solid fa-eye"></i></a>
                                    <form action="/admin-dataAnggota/{{ $item->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('hapus {{ $item->nama }} ?')"
                                            class="btn btn-danger btn-sm"
                                            style="padding: 8px 28px;margin:0px 0px 3px 0px;"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Modal-show-user -->
        @foreach ($anggotas as $item)
            <div class="modal fade" id="showmodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat User</h1>

                            <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"
                                style="cursor: pointer"></i>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">


                                <div class="d-flex " style="justify-content: center;">
                                    @if ($item->image)
                                        <img src="{{ asset('storage/dataGekraf/' . $item->image) }}"
                                            style="height: 20rem; object-fit: cover;padding:3px" class="card-img-top"
                                            alt="...">
                                    @else
                                        <img src="/img/images.png" style="height: 15rem; object-fit: cover;padding:3px"
                                            class="card-img-top" alt="...">
                                    @endif
                                </div>
                                <label for="name" class="mt-3">Nama Lengkap </label>
                                <input name="name" class="form-control " style=""value="{{ $item->nama }}"
                                    disabled>
                                <div class="row">
                                    <div class="col mt-3">
                                        <label>NIK</label>
                                        <input class="form-control" type="text" name="email" id=""
                                            value="{{ $item->nik }}" disabled>
                                    </div>
                                    <div class="col mt-3">
                                        <label>Usaha</label>
                                        <input class="form-control" type="text" name="" id=""
                                            value="{{ $item->nama_usaha }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <label>Alamat</label>
                                    <input class="form-control" type="text" name="email" id=""
                                           value="{{ $item->alamat }}" disabled>
                                </div>
                                <div class="row">
                                    <label>Asal DPC</label>
                                    <input class="form-control" type="text" name="email" id=""
                                           value="{{ $item->nama_kota }}" disabled>
                                </div>
                                <div class="row">
                                    <label>Sub Sektor</label>
                                    <input class="form-control" type="text" name="email" id=""
                                           value="{{ $item->sub_sektor }}" disabled>
                                </div>
                            </div>


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
