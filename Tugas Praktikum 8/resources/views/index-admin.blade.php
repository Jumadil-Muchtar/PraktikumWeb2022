@extends('layout-index')

@section('tombol-daftar')
<li class="nav-item">
    <button class="nav-link btn btn-dark" data-bs-target="#modaldaftar" data-bs-toggle="modal">Buat Akun</button>
</li>
<!-- Modal Register -->
<div class="modal fade" id="modaldaftar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/admin/add') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="email@example.com" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required minlength="8">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="role" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select id="role" name="role" class="form-select text-center" required>
                                <option selected disabled>- Pilih role -</option>
                                <option value="admin">Admin</option>
                                <option value="mahasiswa">Mahasiswa</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" value="regist" class="btn btn-primary">Buat akun</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('container-input')
<div class="container py-3">
    <div class="card">
        <div class="card-header text-center">
            <b>Masukkan atau Edit Data Mahasiswa</b>
        </div>
        <div class="card-body">
            <!-- Pesan -->
            <div>
                @include('message')
            </div>
            <form action="{{ url('/admin/insert') }}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" maxlength="10" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" maxlength="255" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat" maxlength="255" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                    <div class="col-sm-10">
                        <select name="fakultas" class="form-select" aria-label="fakultas" required>
                            <option selected disabled>- Pilih fakultas -</option>
                            <option value="Fakultas Teknik">Fakultas Teknik</option>
                            <option value="Fakultas Matematika dan Ilmu Pengetahuan Alam">Fakultas Matematika dan Ilmu Pengetahuan Alam</option>
                            <option value="Fakultas Ekonomi Bisnis">Fakultas Ekonomi Bisnis</option>
                            <option value="Fakultas Hukum">Fakultas Hukum</option>
                            <option value="Fakultas Ilmu Sosial Politik">Fakultas Ilmu Sosial Politik</option>
                            <option value="Fakultas Ilmu Budaya">Fakultas Ilmu Budaya</option>
                            <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                            <option value="Fakultas Kedokteran Gigi">Fakultas Kedokteran Gigi</option>
                            <option value="Fakultas Kesehatan Masyarakat">Fakultas Kesehatan Masyarakat</option>
                            <option value="Fakultas Farmasi">Fakultas Farmasi</option>
                            <option value="Fakultas Keperawatan">Fakultas Keperawatan</option>
                            <option value="Fakultas Pertanian">Fakultas Pertanian</option>
                            <option value="Fakultas Peternakan">Fakultas Peternakan</option>
                            <option value="Fakultas Ilmu Kelautan dan Perikanan">Fakultas Ilmu Kelautan dan Perikanan</option>
                            <option value="Fakultas Kehutanan">Fakultas Kehutanan</option>
                        </select>
                    </div>
                </div>
                <button type="submit" value="input" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>
</div>    
@endsection

@section('tabel')
<thead>
    <tr>
        <th>No</th>
        <th class="text-center">@sortablelink('nim','NIM')</th>
        <th class="text-center">@sortablelink('nama','Nama')</th>
        <th class="text-center">@sortablelink('alamat','Alamat')</th>
        <th class="text-center">@sortablelink('fakultas','Fakultas')</th>
        <th width="20%" class="text-center">Aksi</th>
    </tr>
</thead>
<tbody class="table-group-divider">
    @foreach ($mahasiswa as $m)
    <tr>
        <td>{{($mahasiswa->firstItem()-1) + $loop->iteration}}</td>
        <td>{{$m->nim}}</td>
        <td>{{$m->nama}}</td>
        <td>{{$m->alamat}}</td>
        <td>{{$m->fakultas}}</td>
        <td class="container-button">
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updatedata{{$m->nim}}">Edit</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusdata{{$m->nim}}">Hapus</button>
        </td>   
    </tr>
        <!-- Modal update data -->
        <div class="modal fade" id="updatedata{{$m->nim}}" tabindex="-1" aria-labelledby="modalUpdate" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit Data Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="/admin/update/{{$m->nim}}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="nimbaru" class="col-sm-2 col-form-label">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nimbaru" class="form-control" value="{{$m->nim}}" maxlength="10" disabled>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namabaru" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="namabaru" class="form-control" value="{{$m->nama}}" maxlength="255" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamatbaru" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" name="alamatbaru" class="form-control" value="{{$m->alamat}}" maxlength="255" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="fakultasbaru" class="col-sm-2 col-form-label">Fakultas</label>
                                <div class="col-sm-10">
                                    <select name="fakultasbaru" class="form-select" aria-label="fakultas_baru" required>
                                        <option selected>{{$m->fakultas}}</option>
                                        <option value="Fakultas Teknik">Fakultas Teknik</option>
                                        <option value="Fakultas Matematika dan Ilmu Pengetahuan Alam">Fakultas Matematika dan Ilmu Pengetahuan Alam</option>
                                        <option value="Fakultas Ekonomi Bisnis">Fakultas Ekonomi Bisnis</option>
                                        <option value="Fakultas Hukum">Fakultas Hukum</option>
                                        <option value="Fakultas Ilmu Sosial Politik">Fakultas Ilmu Sosial Politik</option>
                                        <option value="Fakultas Ilmu Budaya">Fakultas Ilmu Budaya</option>
                                        <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                                        <option value="Fakultas Kedokteran Gigi">Fakultas Kedokteran Gigi</option>
                                        <option value="Fakultas Kesehatan Masyarakat">Fakultas Kesehatan Masyarakat</option>
                                        <option value="Fakultas Farmasi">Fakultas Farmasi</option>
                                        <option value="Fakultas Keperawatan">Fakultas Keperawatan</option>
                                        <option value="Fakultas Pertanian">Fakultas Pertanian</option>
                                        <option value="Fakultas Peternakan">Fakultas Peternakan</option>
                                        <option value="Fakultas Ilmu Kelautan dan Perikanan">Fakultas Ilmu Kelautan dan Perikanan</option>
                                        <option value="Fakultas Kehutanan">Fakultas Kehutanan</option>
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
        <div class="modal fade" id="hapusdata{{$m->nim}}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Delete Data Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="/admin/delete/{{$m->nim}}" method="post">   
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</tbody>
@endsection
