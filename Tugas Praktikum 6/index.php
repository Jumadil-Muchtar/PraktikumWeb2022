<?php
    require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Mahasiswa</title>
    <link rel="stylesheet" href="localstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/r-2.3.0/sp-2.0.2/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/r-2.3.0/sp-2.0.2/datatables.min.js"></script>
</head>
<body>
    <div class="container py-2">
        <div class="card">
            <div class="card-header text-center">
                <b>Masukkan atau Edit Data Mahasiswa</b>
            </div>
            <div class="card-body">
                <!-- Pesan -->
                <div>
                    <?php 
                    if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        if($pesan == "input"){
                            echo '<div class="alert alert-success" role="alert">Data berhasil di-input.</div>';
                        }else if($pesan == "update"){
                            echo '<div class="alert alert-success" role="alert">Data berhasil di-update.</div>';
                        }else if($pesan == "hapus"){
                            echo '<div class="alert alert-success" role="alert">Data berhasil dihapus.</div>';
                        }
                    }
                    ?>
                </div>
                <!-- Pesan -->
                <form method="POST">
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
                                <option selected disabled></option>
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
                    <button type="submit" name="inputdata" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container py-2">
        <div class="card">
            <div class="card-header text-center">
                <b>Data Mahasiswa</b>
            </div>
            <div class="card-body">
                <table id="example" class="display table" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Fakultas</th>
                            <th width="20%" class="text-center">Aksi</th>
                        </tr>
                    </thead>                                    
                    <tbody>
                        <?php
                            $get = mysqli_query($conn, "SELECT * FROM mahasiswa");  
                            $no = 1;   
                            while($cekmahasiswa = mysqli_fetch_array($get)){
                                $nim = $cekmahasiswa['nim'];
                                $nama = $cekmahasiswa['nama'];
                                $alamat = $cekmahasiswa['alamat'];
                                $fakultas = $cekmahasiswa['fakultas'];
                        ?>                                        
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$nim?></td>
                            <td><?=$nama?></td>
                            <td><?=$alamat?></td>
                            <td><?=$fakultas?></td>
                            <td class="container-button">
                                <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updatedata<?php echo $nim ?>">Edit</a>
                                <!-- <a type="button" class="btn btn-warning" href="update.php?id=<?php echo $nim ?>">Edit</a> -->
                                <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusdata<?php echo $nim ?>">Hapus</a>
                            </td>   
                            <!-- Modal update data -->
                            <div class="modal fade" id="updatedata<?php echo $nim ?>" tabindex="-1" aria-labelledby="modalUpdate" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Mahasiswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST">
                                                <div class="mb-3 row">
                                                    <label for="nim_baru" class="col-sm-2 col-form-label">NIM</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="nim_baru" id="nim" class="form-control" value="<?php echo $nim ?>" maxlength="10" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="nama_baru" class="col-sm-2 col-form-label">Nama</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="nama_baru" class="form-control" value="<?php echo $nama ?>" maxlength="255" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="alamat_baru" class="col-sm-2 col-form-label">Alamat</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="alamat_baru" class="form-control" value="<?php echo $alamat ?>" maxlength="255" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="fakultas_baru" class="col-sm-2 col-form-label">Fakultas</label>
                                                    <div class="col-sm-10">
                                                        <select name="fakultas_baru" class="form-select" aria-label="fakultas_baru" required>
                                                            <option selected disabled><?php echo $fakultas ?></option>
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
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="updatedata" class="btn btn-primary" onclick="update($nim)">Simpan Perubahan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal update data -->
                            <!-- Modal hapus data -->
                            <div class="modal fade" id="hapusdata<?php echo $nim ?>" tabindex="-1">
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
                                            <a type="button" class="btn btn-danger" href="hapus.php?id=<?php echo $nim ?>">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal hapus data -->
                        </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="datatables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>