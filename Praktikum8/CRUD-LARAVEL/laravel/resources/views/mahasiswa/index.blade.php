@extends('layout.template')
<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
  <!-- FORM PENCARIAN -->
  <div class="pb-3">
    <form class="d-flex" action="{{ url('mahasiswa') }}" method="get">
      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
      <button class="btn btn-secondary" type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
      </button>
    </form>
  </div>

  <!-- TOMBOL TAMBAH DATA -->
  <div class="pb-3">
    <form onsubmit="return confirm('Apakah anda ingin menambahkan data?')" class="d-inline"  action="{{ url('mahasiswa/create') }}">
      @csrf
      <button type="submit" name="submit" class="btn btn-primary btn-sm">Tambah Data</button>
    </form>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th class="col-md-1">No</th>
        <th class="col-md-3">NIM</th>
        <th class="col-md-4">Nama</th>
        <th class="col-md-2">Jurusan</th>
        <th class="col-md-2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = $data ->firstItem() ?>
      @foreach ($data as $item)
      <tr>
        <td>{{ $i }}</td>
        <td>{{$item -> nim}}</td>
        <td>{{$item -> nama}}</td>
        <td>{{$item -> jurusan}}</td>

        <td>
          <a href='{{ url('mahasiswa/'.$item -> nim.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
          <form onsubmit="return confirm('Yakin mau menghapus data ini?')" class="d-inline"  action="{{ url('mahasiswa/'. $item -> nim)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button>
          </form>
        </td>
      </tr>
      <?php $i++ ?>
      @endforeach
    </tbody>
  </table>
  {{ $data -> withQueryString() -> links()}}
</div>
<!-- AKHIR DATA --> 
@endsection
