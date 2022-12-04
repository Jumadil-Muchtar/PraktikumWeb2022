@extends('layout.template')
<!-- START FORM -->
@section('konten')
<form action='{{ url('mahasiswa/'. $data -> nim) }}' method='post'>
@csrf
@method('PUT')
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('mahasiswa')}}' class="btn btn-secondary">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-backward-fill" viewBox="0 0 16 16">
        <path d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V8.753l6.267 3.636c.54.313 1.233-.066 1.233-.697v-2.94l6.267 3.636c.54.314 1.233-.065 1.233-.696V4.308c0-.63-.693-1.01-1.233-.696L8.5 7.248v-2.94c0-.63-.692-1.01-1.233-.696L1 7.248V4a.5.5 0 0 0-.5-.5z"/>
      </svg>
      Kembali </a>
    <div class="mb-3 row">
      <label for="nim" class="col-sm-2 col-form-label">NIM</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name='nim' value="{{ $data -> nim }}" id="nim">
      </div>
    </div>
    <div class="mb-3 row">
      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name='nama' value="{{ $data -> nama }}" id="nama">
      </div>
    </div>
    <div class="mb-3 row">
      <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name='jurusan' value="{{ $data -> jurusan }}" id="jurusan">
      </div>
    </div>
    <div class="mb-3 row">
      <label for="jurusan" class="col-sm-2 col-form-label"></label>
      <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
  </div>
</form>
<!-- AKHIR FORM -->
@endsection