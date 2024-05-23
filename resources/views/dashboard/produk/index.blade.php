@extends('dashboard.layouts.master')
@section('content')
    <style>
        .deskripsi-produk {
            color: rgb(80, 83, 85);
            background-color: rgb(233, 236, 239);
            border: 1px solid rgb(210, 214, 218);
            padding: 0px 10px;
            border-radius: 15px;
        }
    </style>
    <div class="container">
        <div id="toast-container" class="toast-top-right"></div>
        <h3 style="color: white">List Produk</h3>

        <div class="card p-3 mb-3" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <div class=" table-striped table-hover ">
                <table class=" table bg-white rounded ">
                    <thead class="text-center">
                        <tr>
                            <th>no</th>
                            <th>Gambar Produk</th>
                            <th>Nama Produk</th>
                            <th>Owner</th>
                            <th>Kategori</th>
                            <th>Lihat</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($produks as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="">
                                    <img src="{{ asset('storage/' . $item->image) }}"
                                        style="width: 70px;height:70px;margin:0;object-fit: cover;" alt="">
                                </td>
                                <td>{{ Str::limit($item->nama_produk, 20, '...') }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->kategori->nama_kategori }}</td>

                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#showmodal{{ $item->id }}">Lihat</button>
                                        </div>

                                    </div>

                                </td>
                                <td>
                                    <div class="col">
                                        <form id="hapus" action="/admin-produk/{{ $item->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                onclick="return confirm('hapus {{ $item->nama_produk }} ?')"
                                                class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="style_paginator " style="float: right;">
                    {{ $produks->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal-show-produk -->
    @foreach ($produks as $item)
        <div class="modal fade" id="showmodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Produk</h1>

                        <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></i>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">


                            <div class="d-flex " style="justify-content: center;">
                                <img src="{{ asset('storage/' . $item->image) }}"
                                    style="height: 300px;object-fit: cover; width:250px;"
                                    class="img-preview  rounded border border-5 border-white shadow"alt="">
                            </div>
                            <div class="d-block mt-3">
                                <label>Nama Produk</label>
                                <input class="form-control" type="text" name="" id=""
                                    value="{{ $item->nama_produk }}" disabled>
                            </div>
                            <div class="d-block mt-3">
                                <label>Kategori Produk</label>
                                <input class="form-control" type="text" name="" id=""
                                    value="{{ $item->kategori->nama_kategori }}" disabled>
                            </div>
                            <div class="d-block mt-3">
                                <label>Deskripsi</label>
                                <div class="deskripsi-produk">
                                    <p>
                                        {!! $item->deskripsi_produk !!}
                                    </p>
                                </div>
                            </div>
                            <div class="d-block mt-3">
                                <div class="row">
                                    <div class="col">
                                        <label>Alamat</label>
                                        <input class="form-control" type="text" name="" id=""
                                            value="{{ $item->alamat }}" disabled>
                                    </div>
                                    <div class="col">
                                        <label>whatsapp</label>
                                        <input class="form-control" type="text" name="" id=""
                                            value="{{ $item->whatsapp }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label>Email</label>
                                        <input class="form-control" type="text" name="" id=""
                                            value="{{ $item->email }}" disabled>
                                    </div>
                                    <div class="col">
                                        <label>Instagram</label>
                                        <input class="form-control" type="text" name="" id=""
                                            value="{{ $item->instagram }}" disabled>
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
        </div>
    @endforeach
@endsection
