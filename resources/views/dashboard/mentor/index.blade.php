@extends('dashboard.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div id="toast-container" class="toast-top-right"></div>

        <a href="/admin-mentor/create" class="btn btn-success" d>Tambah Mentor</a>
        <div class="card p-3" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
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
                        @foreach ($mentors as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kategoriMentor->kategori_mentor }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <div class="row " style="display flex; justify-content:center;">
                                        <div class="col-3">
                                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#showmodal{{ $item->id }}">Lihat</button>
                                        </div>
                                        <div class="col-3">
                                            <a class="btn btn-primary btn-sm" href="/admin-mentor/{{ $item->id }}/edit">
                                                Edit</i></a>
                                        </div>
                                        <div class="col-3">
                                            <form id="hapus" action="/admin-mentor/{{ $item->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    onclick="return confirm('hapus {{ $item->nama }} ?')"
                                                    class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="style_paginator " style="float: right;">
                    {{ $mentors->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-show-kategori -->
    @foreach ($mentors as $mentor)
        <div class="modal fade" id="showmodal{{ $mentor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Lihat Mentor</h1>

                        <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></i>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">


                            <div class="d-flex " style="justify-content: center;">
                                <img src="{{ asset('storage/' . $mentor->image) }}"
                                    style="height: 300px;object-fit: cover; width:250px;"
                                    class="img-preview  rounded border border-5 border-white shadow"alt="">
                            </div>
                            <div class="d-block mt-3">
                                <label>Nama Mentor</label>
                                <input class="form-control" type="text" name="" id=""
                                    value="{{ $mentor->nama }}" disabled>
                            </div>
                            <div class="d-block mt-3">
                                <label>Kategori Mentor</label>
                                <input class="form-control" type="text" name="" id=""
                                    value="{{ $mentor->kategoriMentor->kategori_mentor }}" disabled>
                            </div>
                            <div class="d-block mt-3">
                                <label>Pekerjaan</label>
                                <input class="form-control" type="text" name="" id=""
                                    value="{{ $mentor->pekerjaan }}" disabled>
                            </div>
                            <div class="d-block mt-3">
                                <label>Deskripsi</label>
                                <textarea class="form-control" type="text" name="" id="" rows="3" disabled>{{ $mentor->deskripsi }}</textarea>
                            </div>
                            <div class="d-block mt-3">
                                <div class="row">
                                    <div class="col">
                                        <label>Alamat</label>
                                        <input class="form-control" type="text" name="" id=""
                                            value="{{ $mentor->alamat }}" disabled>
                                    </div>
                                    <div class="col">
                                        <label>whatsapp</label>
                                        <input class="form-control" type="text" name="" id=""
                                            value="{{ $mentor->whatsapp }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label>Email</label>
                                        <input class="form-control" type="text" name="" id=""
                                            value="{{ $mentor->email }}" disabled>
                                    </div>
                                    <div class="col">
                                        <label>Instagram</label>
                                        <input class="form-control" type="text" name="" id=""
                                            value="{{ $mentor->instagram }}" disabled>
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
