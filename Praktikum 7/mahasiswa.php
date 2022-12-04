<?php
require 'koneksi.php';

$data = new Data();
$Auth = new Auth();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$nim        = "";
$nama       = "";
$alamat     = "";
$fakultas   = "";
$sukses     = "";
$error      = "";
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {

    $id         = $_GET['id'];
    $q1  = $data->delete($id);
    // $r2  = $data->delete($id);
    if ($q1) {
        $sukses     = "Berhasil menghapus data ";
    } else {
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'logout') {
    $Auth->logout();
}
if ($op == 'edit') {

    $id         = $_GET['id'];
    $r1 = $data->edit($id);

    $nim        = $r1['nim'];
    $nama       = $r1['nama'];
    $alamat     = $r1['alamat'];
    $fakultas   = $r1['fakultas'];
    if ($nim == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) {
    $nim        = $_POST['nim'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $fakultas   = $_POST['fakultas'];
    if ($nim && $nama && $alamat && $fakultas) {
        if ($op == 'edit') { //update

            $q1 = $data->update($id, $nim, $nama, $alamat, $fakultas);
            if ($q1 == true) {
                $sukses = "Berhasil mengupdate data ";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { // insert
            $num_rows = $data->insert();
            if ($num_rows == false) {
                $error = "data duplikat";
            } else {
                $q1 = $data->insert();
                if ($q1 == true) {
                    $error      = "Gagal memasukkan data";
                } else if ($q1 == false) {
                    $sukses     = "Berhasil memasukkan data ";
                }
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 900px
        }

        .card {
            font-size: 14px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        body {
            height: 100%;
            /* background: rgb(226, 179, 233); 
            #993299, #b266b2,  #d8b2d8*/
            background-color:#748DA6;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header text-white" style="background :#748DA6;">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php

                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:3;url=mahasiswa.php");
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:3;url=mahasiswa.php");
                }

                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="fakultas" id="fakultas">
                                <option value="">- Pilih Fakultas -</option>
                                <option value="Ekonomi dan Bisnis" <?php if ($fakultas == "Ekonomi dan Bisnis") echo "selected" ?>>Ekonomi dan Bisnis</option>
                                <option value="Hukum" <?php if ($fakultas == "Hukum") echo "selected" ?>>Hukum</option>
                                <option value="Kedokteran" <?php if ($fakultas == "Kedokteran") echo "selected" ?>>Kedokteran</option>
                                <option value="Teknik" <?php if ($fakultas == "Teknik") echo "selected" ?>>Teknik</option>
                                <option value="Ilmu Sosial dan Ilmu Politik" <?php if ($fakultas == "Ilmu Sosial dan Ilmu Politik") echo "selected" ?>>Ilmu Sosial dan Ilmu Politik</option>
                                <option value="Ilmu Budaya" <?php if ($fakultas == "Ilmu Budaya") echo "selected" ?>>Ilmu Budaya</option>
                                <option value="Pertanian" <?php if ($fakultas == "Pertanian") echo "selected" ?>>Pertanian</option>
                                <option value="Matematika dan Ilmu Pengetahuan Alam" <?php if ($fakultas == "Matematika dan Ilmu Pengetahuan Alam") echo "selected" ?>>Matematika dan Ilmu Pengetahuan Alam</option>
                                <option value="Peternakan" <?php if ($fakultas == "Peternakan") echo "selected" ?>>Peternakan</option>
                                <option value="Kedokteran Gigi" <?php if ($fakultas == "Kedokteran Gigi") echo "selected" ?>>Kedokteran Gigi</option>
                                <option value="Kesehatan Masyarakat" <?php if ($fakultas == "Kesehatan Masyarakat") echo "selected" ?>>Kesehatan Masyarakat</option>
                                <option value="Ilmu Kelautan dan Perikanan" <?php if ($fakultas == "Ilmu Kelautan dan Perikanan") echo "selected" ?>>Ilmu Kelautan dan Perikanan</option>
                                <option value="Kehutanan" <?php if ($fakultas == "Kehutanan") echo "selected" ?>>Kehutanan</option>
                                <option value="Farmasi" <?php if ($fakultas == "Farmasi") echo "selected" ?>>Farmasi</option>
                                <option value="Keperawatan" <?php if ($fakultas == "Keperawatan") echo "selected" ?>>Keperawatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3" style="float:right">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn" style="color : white; background : #5AA469; border-radius: 15px;" />
                    </div>
                </form>
            </div>
        </div>


        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white" style="background : #748DA6;">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Fakultas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $data = new Data();
                        $rows = $data->tampil();
                        $urut = 1;
                        if (!empty($rows)) {
                            foreach ($rows as $row) {

                        ?>
                                <tr>
                                    <th scope="row"><?php echo $urut++ ?></th>
                                    <td scope="row"><?php echo $row['nim']; ?></td>
                                    <td scope="row"><?php echo $row['nama'];  ?></td>
                                    <td scope="row"><?php echo $row['alamat'];  ?></td>
                                    <td scope="row" style="text-align:justify"><?php echo $row['fakultas'];  ?></td>
                                    <td scope="row">
                                        
                                        <a href="mahasiswa.php?op=edit&id=<?php echo $row['id']; ?>"><button type="button" class="btn" style="color : white; background : #FF7F3F; border-radius: 15px;">Edit</button></a>
                                        <a href="mahasiswa.php?op=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn" style="color : white; background : #FF4A4A; border-radius: 15px;">Delete</button></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
        <div class="card">
            <div class="d-grid gap-2">
                <a href="mahasiswa.php?op=logout" class="btn text-white" style="background : #FF4A4A;" type="button">LogOut</a>

            </div>

        </div>


</body>

</html>