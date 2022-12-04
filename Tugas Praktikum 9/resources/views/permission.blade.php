@extends('layout')

@section('nama')
<b>Permission</b>
@endsection

@section('input')
<div class="container py-3">
    <div class="card">
        <div class="card-header text-center">
            <b>Masukkan atau Edit Data Permission</b>
        </div>
        <div class="card-body">
            <!-- Pesan -->
            <div>
                @include('message')
            </div>
            <form action="/permission/insert" method="POST">
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
                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea type="textarea" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Masukkan deskripsi" value="{{ old('description') }}"></textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                            <option selected disabled>Pilih Status Izin</option>
                            <option value="Izin Berlaku">Izin Berlaku</option>
                            <option value="Izin Kedaluwarsa">Izin Kedaluwarsa</option>
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
            <th class="text-center">Deskripsi</th>
            <th class="text-center">Status</th>
            <th width="12%" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($permission as $p)
            <tr>
                <td>{{($permission->firstItem()-1) + $loop->iteration}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->description}}</td>
                <td>{{$p->status}}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updatedata{{$p->id}}">Edit</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusdata{{$p->id}}">Hapus</button>
                </td>
                <!-- Modal update data -->
                <div class="modal fade" id="updatedata{{$p->id}}" tabindex="-1" aria-labelledby="modalUpdate" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Edit Data Permission</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="/permission/update">
                                @csrf
                                <div class="modal-body">
                                    <input type="text" name="id" class="form-control" value="{{$p->id}}" hidden>
                                    <div class="mb-3 row">
                                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control" value="{{$p->name}}" maxlength="255" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea type="textarea" name="description" class="form-control" placeholder="Masukkan deskripsi" required>{{$p->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="status" required>
                                                <option selected disabled>{{$p->status}}</option>
                                                <option value="Izin Berlaku">Izin Berlaku</option>
                                                <option value="Izin Kedaluwarsa">Izin Kedaluwarsa</option>
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
                <div class="modal fade" id="hapusdata{{$p->id}}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi Delete Data Permission</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin ingin menghapus data ini?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="/permission/delete" method="post">   
                                    @csrf
                                    @method('delete')
                                    <input type="text" name="id" class="form-control" value="{{$p->id}}" hidden>
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
{!! $permission->appends(Request::except('page'))->render() !!}
@endsection