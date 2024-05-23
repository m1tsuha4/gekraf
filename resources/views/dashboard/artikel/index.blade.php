@extends('dashboard.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div id="toast-container" class="toast-top-right"></div>

        <a href="/admin-artikel/create" class="btn btn-success" d>Tambah Artikel</a>
        {{-- <div class="card p-3" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <div class=" table-striped table-hover ">
                <table class=" table bg-white rounded ">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Kategori Mentor</th>
                            <th>Email</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($artikels as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->kategoriMentor->kategori_mentor }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <div class="row " style="display flex; justify-content:center;">
                                        <div class="col-3">
                                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#showmodal{{ $item->id }}"><i
                                                    class="fa-solid fa-eye"></i></button>
                                        </div>
                                        <div class="col-3">
                                            <a class="btn btn-primary btn-sm" href="/admin-mentor/{{ $item->id }}/edit">
                                                <i class="fa-solid fa-pen"></i></a>
                                        </div>
                                        <div class="col-3">
                                            <form id="hapus" action="/admin-mentor/{{ $item->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    onclick="return confirm('hapus {{ $item->nama }} ?')"
                                                    class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="style_paginator " style="float: right;">
                    {{ $artikels->links() }}
                </div>
            </div>
        </div> --}}
        <div class="row mb-3">
            @foreach ($artikels as $item)
                <div class="col-3 align-items-start">
                    <div class="card"
                        style="width: calc(100/4);box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;margin-bottom: 10px;">
                        <img src="{{ asset('storage/articles/' . $item->image) }}"
                            style="height: 15rem; object-fit: cover;padding:3px" class="card-img-top" alt="...">
                        <div class="card-body p-3">
                            <p class="card-text" style="font-weight: bold;">{{ $item->judul }}</p>
                            {{-- <p class="card-text">{{ $item->excerpt }}</p> --}}
                            <div class="d-flex " style="gap:3px">
                                <a href="#" class="btn btn-secondary btn-sm"
                                    style="padding: 8px 28px;margin:0px 0px 3px 0px;" data-bs-toggle="modal"
                                    data-bs-target="#showmodal{{ $item->id }}"><i class="fa-solid fa-eye"></i></a>


                                <a href="/admin-artikel/{{ $item->id }}/edit" class="btn btn-primary btn-sm "
                                    style="padding: 8px 28px;margin:0px 0px 3px 0px; ">
                                    <i class="fa-solid fa-pen"></i></a>


                                <form action="/admin-artikel/{{ $item->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('hapus artikel ?')"
                                        class="btn btn-danger btn-sm" style="padding: 8px 28px;margin:0px 0px 3px 0px;"><i
                                            class="fa-solid fa-trash"></i></button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Modal-show-kategori -->
        @foreach ($artikels as $item)
            <div class="modal fade" id="showmodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Artikel</h1>

                            <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"
                                style="cursor: pointer"></i>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">


                                <div class="d-flex " style="justify-content: center;">
                                    <img src="{{ asset('storage/articles/' . $item->image) }}"
                                        style="height: 400px;object-fit: cover; width:100%;"
                                        class="img-preview  rounded border border-5 border-white shadow"alt="">
                                </div>

                                <h3 class="mt-3" style="text-align: center">{{ $item->judul }}</h3>
                                <p class="mt-3" style="text-align: justify">{{ $item->deskripsi }}</p>
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
