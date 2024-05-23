@extends('auth.layouts.auth-layouts')
@section('content')
<section
class="d-flex justify-content-center align-items-center"
id="daftar"
>
<div
  class="container-fluid d-flex justify-content-center align-items-center"
>
    <form action="{{ route('daftarAkun') }}" method="post" enctype="multipart/form-data">
        @csrf  <!-- Include the CSRF token -->

  <div class="row daftarForm">
    <div class="col-md-12">
      <div class="row mb-5 daftarHeader d-flex flex-row">
        <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="" />
        <h1 class="w-50">Daftar Akun UMKM</h1>
      </div>
      <div class="row textForm">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="namaPemilik" class="form-label"
              >Nama Pemilik</label
            >
            <input type="text" class="form-control" id="namaPemilik" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="namaUsaha" class="form-label">Nama Usaha</label>
            <input type="password" class="form-control" id="namaUsaha" />
          </div>
        </div>
      </div>
      <div class="row textForm">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="produkUsaha" class="form-label"
              >Produk Usaha</label
            >
            <input
              type="password"
              class="form-control"
              id="produkUsaha"
            />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 checkboxContainer">
          <div class="row textForm">
            <label for="">Sub Sektor Ekonomi Kreatif</label>
            <p>*Pilih satu atau lebih sub sektor usaha</p>
          </div>

          <div class="row mb-2">
            <div class="col-md-3">
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check mb-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
            </div>
          </div>
          <div class="row textForm">
              <div class="mb-3">
                  <label for="deskripsiUsaha" class="form-label">Deskripsi Usaha</label>
                  <textarea class="form-control" id="deskripsiUsaha" rows="5"></textarea>
                </div>
          </div>
          <div class="row textForm">
              <div class="col-md-6">
                  <div class="mb-3">
                      <label for="instagram" class="form-label">Instagram</label>
                      <input type="password" class="form-control" id="instagram" />
                    </div>
              </div>

              <div class="col-md-6">
                  <div class="mb-3">
                      <label for="facebook" class="form-label">Facebook</label>
                      <input type="password" class="form-control" id="facebook" />
                    </div>
          </div>
        </div>

        <div class="row mb-5  textForm">
          <div class="col-md-6">
              <div class="mb-3">
                  <label for="nomorHp" class="form-label">Nomor Handphone</label>
                  <input type="password" class="form-control" id="nomorHp" />
                </div>
          </div>
        </div>
        <div class="row">
          <button class="btn btn-primary btn-first" >Selesai</button>
      </div>
      </div>
    </div>
  </div>
</div>
    </form>
</div>
</section>
@endsection
