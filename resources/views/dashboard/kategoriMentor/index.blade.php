@extends('dashboard.layouts.master')
@section('content')
    @include('sweetalert::alert')

    <div class="container">
        <div id="toast-container" class="toast-top-right"></div>

        <button href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahmodal">Tambah
            Kategori Mentor</button>
        <div class="card p-3" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <div class=" table-striped table-hover ">
                <table class=" table bg-white rounded text-center">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Kategori Mentor</th>
                            <th>Tanggal buat</th>
                            <th>Tanggal edit</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody style="">
                        @foreach ($KategoriMentor as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kategori_mentor }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editmodal{{ $item->id }}">Edit</button>
                                </td>
                                <td>
                                    <form id="hapus" action="/admin-kategoriMentor/{{ $item->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            onclick="return confirm('hapus {{ $item->kategori_mentor }} ?')"
                                            class="btn btn-danger btn-sm">Hapus</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="style_paginator " style="float: right;">
                    {{ $KategoriMentor->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-edit-kategori -->
    @foreach ($KategoriMentor as $item)
        <div class="modal fade" id="editmodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori</h1>

                        <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></i>
                    </div>
                    <form action="/admin-kategoriMentor/{{ $item->id }}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Kategori
                                    Produk</label>
                                <input type="text" name="kategori_mentor"
                                    class="form-control @error('kategori_mentor') is-invalid @enderror"
                                    id="exampleFormControlInput1" value="{{ $item->kategori_mentor }}">
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

    <!-- Button trigger modal -->
    <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn bg-gradient-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal-tambah-kategori --}}
    <div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Mentor</h1>

                    <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></i>
                </div>
                <form action="{{ url('admin-kategoriMentor') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Kategori
                                Mentor</label>
                            <input type="text" name="kategori_mentor" class="form-control"
                                id="exampleFormControlInput1" placeholder="Desain Grafis">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Tambah Kategori Mentor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
