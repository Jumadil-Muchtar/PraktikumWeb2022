@extends('layout')

@section('nama')
<b>Product</b>
@endsection

@section('input')
<div class="container py-3">
    <div class="card">
        <div class="card-header text-center">
            <b>Masukkan atau Edit Data Product</b>
        </div>
        <div class="card-body">
            <!-- Pesan -->
            <div>
                @include('message')
            </div>
            <form action="/product/insert" method="POST">
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
                    <label for="seller_id" class="col-sm-2 col-form-label">ID Seller</label>
                    <div class="col-sm-10">
                        <input type="text" name="seller_id" class="form-control @error('seller_id') is-invalid @enderror" placeholder="Masukkan ID Seller" maxlength="255" value="{{ old('seller_id') }}">
                        @error('seller_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="category_id" class="col-sm-2 col-form-label">ID Category</label>
                    <div class="col-sm-10">
                        <input type="text" name="category_id" class="form-control @error('category_id') is-invalid @enderror" placeholder="Masukkan ID Category" maxlength="255" value="{{ old('category_id') }}">
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Masukkan harga" min="0" step="100" value="{{ old('price') }}">
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-select @error('status') is-invalid @enderror" name="status">
                            <option selected disabled>Pilih Status</option>
                            <option value="Terkirim">Terkirim</option>
                            <option value="Belum Terkirim">Belum Terkirim</option>
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
            <th class="text-center">Nama Seller</th>
            <th class="text-center">Category</th>
            <th class="text-center">Price</th>
            <th class="text-center">Status</th>
            <th width="12%" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($product as $p)
            <tr>
                <td>{{($product->firstItem()-1) + $loop->iteration}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->seller->name}}</td>
                <td>{{$p->category->name}}</td>
                <td>Rp{{$p->price}}</td>
                <td>{{$p->status}}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updatedata{{$p->id}}">Edit</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusdata{{$p->id}}">Hapus</button>
                </td>
                <!-- Modal update data -->
                <div class="modal fade" id="updatedata{{$p->id}}" tabindex="-1" aria-labelledby="modalUpdate" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Edit Data Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="/product/update">
                                @csrf
                                <div class="modal-body">
                                    <input type="text" name="id" class="form-control" value="{{$p->id}}" hidden>
                                    <div class="mb-3 row">
                                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control" value="{{$p->name}}" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="seller_id" class="col-sm-2 col-form-label">ID Seller</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="seller_id" class="form-control" value="{{$p->seller_id}}" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="category_id" class="col-sm-2 col-form-label">ID Category</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="category_id" class="form-control" value="{{$p->category_id}}" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                                                <input type="number" name="price" class="form-control" value="{{$p->price}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="status" required>
                                                <option value="Terkirim" selected>{{$p->status}}</option>
                                                <option value="Terkirim">Terkirim</option>
                                                <option value="Belum Terkirim">Belum Terkirim</option>
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
                                <h5 class="modal-title">Konfirmasi Delete Data Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin ingin menghapus data ini?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="/product/delete" method="post">   
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
{!! $product->appends(Request::except('page'))->render() !!}
@endsection