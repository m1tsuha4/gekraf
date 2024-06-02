@extends('dashboard.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div id="toast-container" class="toast-top-right"></div>

        <h3 style="color: white">Data UMKM dan Pokdarwis</h3>

        <div class="row mb-3">
            @foreach ($anggotas as $item)
                <div class="col-3 align-items-start">
                    <div class="card text-center" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;margin-bottom: 10px;">
                        @if ($item->image)
                            <img src="{{ asset('storage/user/' . $item->image) }}"
                                style="height: 10rem; object-fit: cover;padding:3px" class="card-img-top" alt="...">
                        @else
                            <img src="/img/images.png" style="height: 10rem; object-fit: cover;padding:3px"
                                class="card-img-top" alt="...">
                        @endif
                        <div class="card-body p-3">
                            <p class="card-text" style="font-weight: bold;">{{ $item->name }}</p>
                            <p class="card-text">{{ $item->nik }}</p>
                            <div class="d-flex " style="gap:3px;text-align:center;justify-content:center">
                                <a href="#" class="btn btn-secondary btn-sm"
                                    style="padding: 8px 28px;margin:0px 0px 3px 0px;" data-bs-toggle="modal"
                                    data-bs-target="#showmodal{{ $item->id_umkm }}"><i class="fa-solid fa-eye"></i></a>
                                    <form action="/admin-dataAnggota/{{ $item->id_umkm }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('hapus {{ $item->name }} ?')"
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
            <div class="modal fade" id="showmodal{{ $item->id_umkm }}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                        <img src="{{ asset('storage/user/' . $item->image) }}"
                                            style="height: 20rem; object-fit: cover;padding:3px" class="card-img-top"
                                            alt="...">
                                    @else
                                        <img src="/img/images.png" style="height: 15rem; object-fit: cover;padding:3px"
                                            class="card-img-top" alt="...">
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col mt-3">
                                        <label for="name" class="mt-3">Nama Lengkap </label>
                                        <input name="name" class="form-control " style=""value="{{ $item->name }}"
                                            disabled>
                                    </div>
                                    <div class="col mt-3">
                                        <label>NIB</label>
                                        <input class="form-control" type="text" name="email" id=""
                                               value="{{ $item->nib }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-3">
                                        <label>NIK</label>
                                        <input class="form-control" type="text" name="email" id=""
                                            value="{{ $item->nik }}" disabled>
                                    </div>
                                    <div class="col mt-3">
                                        <label>Nama Usaha</label>
                                        <input class="form-control" type="text" name="" id=""
                                            value="{{ $item->nama_usaha }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-3">
                                        <label>Alamat Usaha</label>
                                        <input class="form-control" type="text" name="email" id=""
                                            value="{{ $item->alamat_usaha }}" disabled>
                                    </div>
                                    <div class="col mt-3">
                                        <label>Asal DPC</label>
                                        <input class="form-control" type="text" name="" id=""
                                            value="{{ $item->nama_kota }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-3">
                                        <label>Alamat Pemilik</label>
                                        <input class="form-control" type="text" name="email" id=""
                                               value="{{ $item->alamat_pemilik }}" disabled>
                                       </div>
                                   <div class="col mt-3">
                                    <label>Sub Sektor</label>
                                    <input class="form-control" type="text" name="email" id=""
                                           value="{{ $item->sub_sektor }}" disabled>
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-3">
                                        <label>Produk Usaha</label>
                                        <input class="form-control" type="text" name="email" id=""
                                               value="{{ $item->produk_usaha }}" disabled>
                                       </div>
                                   <div class="col mt-3">
                                    <label>Klasifikasi UMKM</label>
                                    <input class="form-control" type="text" name="email" id=""
                                           value="{{ $item->klasifikasi }}" disabled>
                                   </div>
                                </div>
                                <div class="row">
                                    
                                   <div class="col mt-3">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="" cols="20" rows="10" disabled >{{ $item->deskripsi }}</textarea>
                                
                                   </div>
                                </div>
                                <div class="row">
                                    <div class="col mt-3">
                                        <label>Instagram</label>
                                        <input class="form-control" type="text" name="email" id=""
                                               value="{{ $item->instagram }}" disabled>
                                       </div>
                                   <div class="col mt-3">
                                    <label>Facebook</label>
                                    <input class="form-control" type="text" name="email" id=""
                                           value="{{ $item->facebook }}" disabled>
                                   </div>
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
