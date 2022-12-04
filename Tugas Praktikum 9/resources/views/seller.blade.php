@extends('layout')

@section('nama')
<b>Seller</b>
@endsection

@section('input')
<div class="container py-3">
    <div class="card">
        <div class="card-header text-center">
            <b>Masukkan atau Edit Data Seller</b>
        </div>
        <div class="card-body">
            <!-- Pesan -->
            <div>
                @include('message')
            </div>
            <form action="/seller/insert" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama" maxlength="255" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Masukkan alamat" value="{{ old('address') }}">
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-select @error('gender') is-invalid @enderror" name="gender">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="no_hp" class="col-sm-2 col-form-label">No. HP</label>
                    <div class="col-sm-10">
                        <input type="tel" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Masukkan no. HP" value="{{ old('no_hp') }}">
                        @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-select @error('status') is-invalid @enderror" name="status">
                            <option selected disabled>Masukkan Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <button type="submit" value="input" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>
</div>    
@endsection

@section('tabel')
<table id="mahasiswa" class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">No. HP</th>
            <th class="text-center">Status</th>
            <th width="12%" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($seller as $s)
            <tr>
                <td>{{($seller->firstItem()-1) + $loop->iteration}}</td>
                <td>{{$s->name}}</td>
                <td>{{$s->address}}</td>
                <td>{{$s->gender}}</td>
                <td>{{$s->no_hp}}</td>
                <td>{{$s->status}}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updatedata{{$s->id}}">Edit</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusdata{{$s->id}}">Hapus</button>
                </td>
                <!-- Modal update data -->
                <div class="modal fade" id="updatedata{{$s->id}}" tabindex="-1" aria-labelledby="modalUpdate" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Edit Data seller</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="/seller/update">
                                @csrf
                                <div class="modal-body">
                                    <input type="text" name="id" class="form-control" value="{{$s->id}}" hidden>
                                    <div class="mb-3 row">
                                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control" value="{{$s->name}}" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="address" class="form-control" value="{{$s->address}}" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="gender" required>
                                                <option value="{{$s->gender}}" selected>{{$s->gender}}</option>
                                                <option value="Pria">Pria</option>
                                                <option value="Wanita">Wanita</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="no_hp" class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-10">
                                            <input type="tel" name="no_hp" class="form-control" value="{{$s->no_hp}}" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="status" required>
                                                <option value="{{$s->status}}" selected>{{$s->status}}</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" value="update" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal hapus data -->
                <div class="modal fade" id="hapusdata{{$s->id}}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi Delete Data seller</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin ingin menghapus data ini?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="/seller/delete" method="post">   
                                    @csrf
                                    @method('delete')
                                    <input type="text" name="id" class="form-control" value="{{$s->id}}" hidden>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>   
            </tr>
        @endforeach
    </tbody>
</table>
{!! $seller->appends(Request::except('page'))->render() !!}
@endsection