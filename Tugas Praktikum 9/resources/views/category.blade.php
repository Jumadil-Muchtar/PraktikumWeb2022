@extends('layout')

@section('nama')
<b>Category</b>
@endsection

@section('input')
<div class="container py-3">
    <div class="card">
        <div class="card-header text-center">
            <b>Masukkan atau Edit Data Category</b>
        </div>
        <div class="card-body">
            <!-- Pesan -->
            <div>
                @include('message')
            </div>
            <form action="/category/insert" method="POST">
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
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option selected disabled>Pilih Status</option>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
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
            <th class="text-center">Status</th>
            <th width="12%" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($category as $c)
            <tr>
                <td>{{($category->firstItem()-1) + $loop->iteration}}</td>
                <td>{{$c->name}}</td>
                <td>{{$c->status}}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updatedata{{$c->id}}">Edit</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusdata{{$c->id}}">Hapus</button>
                </td>
                <!-- Modal update data -->
                <div class="modal fade" id="updatedata{{$c->id}}" tabindex="-1" aria-labelledby="modalUpdate" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Edit Data Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="/category/update">
                                @csrf
                                <div class="modal-body">
                                    <input type="text" name="id" class="form-control" value="{{$c->id}}" hidden>
                                    <div class="mb-3 row">
                                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <select name="name" class="form-select" required>
                                                <option value="{{$c->name}}" selected>{{$c->name}}</option>
                                                @foreach ($category as $ct)
                                                    <option value="{{$ct->name}}">{{$ct->name}}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-select">
                                                <option value="{{$c->status}}" selected>{{$c->status}}</option>
                                                <option value="Tersedia">Tersedia</option>
                                                <option value="Tidak Tersedia">Tidak Tersedia</option>
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
                <div class="modal fade" id="hapusdata{{$c->id}}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi Delete Data Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin ingin menghapus data ini?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="/category/delete" method="post">   
                                    @csrf
                                    @method('delete')
                                    <input type="text" name="id" class="form-control" value="{{$c->id}}" hidden>
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
{!! $category->appends(Request::except('page'))->render() !!}
@endsection