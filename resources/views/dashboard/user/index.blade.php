@extends('dashboard.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div id="toast-container" class="toast-top-right"></div>

        <h3 style="color: white">User</h3>

        <div class="row mb-3">
            @foreach ($users as $item)
                <div class="col-3 align-items-start">
                    <div class="card text-center" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;margin-bottom: 10px;">
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}"
                                style="height: 10rem; object-fit: cover;padding:3px" class="card-img-top" alt="...">
                        @else
                            <img src="/img/images.png" style="height: 10rem; object-fit: cover;padding:3px"
                                class="card-img-top" alt="...">
                        @endif
                        <div class="card-body p-3">
                            <p class="card-text" style="font-weight: bold;">{{ $item->name }}</p>
                            <p class="card-text">{{ $item->whatsapp }}</p>
                            <div class="d-flex " style="gap:3px;text-align:center;justify-content:center">
                                <a href="#" class="btn btn-secondary btn-sm"
                                    style="padding: 8px 28px;margin:0px 0px 3px 0px;" data-bs-toggle="modal"
                                    data-bs-target="#showmodal{{ $item->id }}"><i class="fa-solid fa-eye"></i></a>

                                @if ($item->is_admin == false)
                                    <form action="/admin-user/{{ $item->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('hapus {{ $item->name }} ?')"
                                            class="btn btn-danger btn-sm"
                                            style="padding: 8px 28px;margin:0px 0px 3px 0px;"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Modal-show-user -->
        @foreach ($users as $item)
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
                                        <img src="{{ asset('storage/' . $item->image) }}"
                                            style="height: 20rem; object-fit: cover;padding:3px" class="card-img-top"
                                            alt="...">
                                    @else
                                        <img src="/img/images.png" style="height: 15rem; object-fit: cover;padding:3px"
                                            class="card-img-top" alt="...">
                                    @endif
                                </div>
                                <label for="name" class="mt-3">Nama Lengkap :</label>
                                <input name="name" class="form-control " style=""value="{{ $item->name }}"
                                    disabled>
                                <div class="row">
                                    <div class="col mt-3">
                                        <label>Email</label>
                                        <input class="form-control" type="email" name="email" id=""
                                            value="{{ $item->email }}" disabled>
                                    </div>
                                    <div class="col mt-3">
                                        <label>whatsapp</label>
                                        <input class="form-control" type="text" name="" id=""
                                            value="{{ $item->whatsapp }}" disabled>
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
