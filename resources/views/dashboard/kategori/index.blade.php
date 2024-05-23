@extends('dashboard.layouts.master')
@section('content')
    @include('sweetalert::alert')

    <div class="container">
        <div id="toast-container" class="toast-top-right"></div>

        <button href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahmodal">Tambah
            Kategori</button>
        <div class="card p-3 mb-3" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <div class=" table-striped table-hover ">
                <table class=" table bg-white rounded text-center">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Kategori</th>
                            <th>Tanggal buat</th>
                            <th>Tanggal edit</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody style="">
                        @foreach ($kategoris as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_kategori }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editmodal{{ $item->id }}">Edit</button>
                                </td>
                                <td>
                                    <form id="hapus" action="{{ route('kategoris.destroy', $item->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            onclick="return confirm('hapus {{ $item->nama_kategori }} ?')"
                                            class="btn btn-danger btn-sm">Hapus</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="style_paginator " style="float: right;">
                    {{ $kategoris->links() }}
                </div>
            </div>
        </div>
        <!-- Modal-edit-kategori -->
        @foreach ($kategoris as $item)
            <div class="modal fade" id="editmodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori</h1>

                            <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"
                                style="cursor: pointer"></i>
                        </div>
                        <form action="/admin-kategori/{{ $item->id }}" method="post">
                            @method('put')
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"
                                        style="font-size: .8em">Kategori
                                        Produk</label>
                                    <input type="text" name="nama_kategori"
                                        class="form-control @error('nama_kategori') is-invalid @enderror"
                                        id="exampleFormControlInput1" value="{{ $item->nama_kategori }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-primary">Edit Kategori</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- modal-tambah-kategori --}}
        <div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>

                        <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></i>
                    </div>
                    <form action="{{ url('admin-kategori') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Kategori
                                    Produk</label>
                                <input type="text" name="nama_kategori" class="form-control"
                                    id="exampleFormControlInput1" placeholder="Makanan">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
