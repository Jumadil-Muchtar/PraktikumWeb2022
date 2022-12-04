@extends('layout')

@section('nama')
<b>Permission Seller</b>
@endsection

@section('input')
<div class="container py-3">
    <div class="card">
        <div class="card-header text-center">
            <b>Masukkan atau Edit Data Permission Seller</b>
        </div>
        <div class="card-body">
            <!-- Pesan -->
            <div>
                @include('message')
            </div>
            <form action="/permissionseller/insert" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="seller" class="col-sm-2 col-form-label">Seller</label>
                    <div class="col-sm-10">
                        <select name="seller" class="form-select @error('seller') is-invalid @enderror">
                            <option selected disabled>Pilih Seller</option>
                            @foreach($seller as $s)
                                <option value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                          </select>
                        @error('seller')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="permission" class="col-sm-2 col-form-label">Permission</label>
                    <div class="col-sm-10">
                        <select name="permission" class="form-select @error('permission') is-invalid @enderror">
                            <option selected disabled>Pilih Permission</option>
                            @foreach($permission as $p)
                                <option value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach
                          </select>
                        @error('permission')
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
            <th class="text-center">Seller</th>
            <th class="text-center">Permission</th>
            <th width="12%" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($permissionseller as $ps)
            <tr>
                <td>{{($permissionseller->firstItem()-1) + $loop->iteration}}</td>
                <td>{{$ps->seller->name}}</td>
                <td>{{$ps->permission->name}}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updatedata{{$ps->id}}">Edit</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusdata{{$ps->id}}">Hapus</button>
                </td>
                <!-- Modal update data -->
                <div class="modal fade" id="updatedata{{$ps->id}}" tabindex="-1" aria-labelledby="modalUpdate" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Edit Data Permission Seller</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="/permissionseller/update">
                                @csrf
                                <div class="modal-body">
                                    <input type="text" name="id" class="form-control" value="{{$ps->id}}" hidden>
                                    <div class="mb-3 row">
                                        <select name="seller" class="form-select" required>
                                            <option value="{{$ps->seller_id}}" selected>{{$ps->seller->name}}</option>
                                            @foreach($seller as $s)
                                                <option value="{{$s->id}}">{{$s->name}}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                    <div class="mb-3 row">
                                        <select name="permission" class="form-select" required>
                                            <option value="{{$ps->permission_id}}" selected>{{$ps->permission->name}}</option>
                                            @foreach($permission as $p)
                                                <option value="{{$p->id}}">{{$p->name}}</option>
                                            @endforeach
                                          </select>
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
                <div class="modal fade" id="hapusdata{{$ps->id}}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi Delete Data Permission Seller</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin ingin menghapus data ini?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="/permissionseller/delete" method="post">   
                                    @csrf
                                    @method('delete')
                                    <input type="text" name="id" class="form-control" value="{{$ps->id}}" hidden>
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
{!! $permissionseller->appends(Request::except('page'))->render() !!}
@endsection