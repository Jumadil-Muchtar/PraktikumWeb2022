<?php

include 'function.php';

session_start();

include 'ceklogin.php';

include 'checkbutton.php';

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
    <div id="navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Data Mahasiswa</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <form method="POST" class="m-0">
                            <button type="submit" name="logout" class="nav-link btn btn-dark" href="">Logout</button>
                        </form>
                    </li>
                </ul>
                </div>
                <div>
                    <a class="navbar-brand" href="#">Halo, <?= $_SESSION['nama']?>!</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="container py-3">
        <div class="card">
            <div class="card-header text-center">
                <b>Data Mahasiswa</b>
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered table-light">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Fakultas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $listmahasiswa = select("SELECT * FROM mahasiswa");
                            foreach ($listmahasiswa as $mahasiswa) :
                                $nim = $mahasiswa['nim'];
                                $nama = $mahasiswa['nama'];
                                $alamat = $mahasiswa['alamat'];
                                $fakultas = $mahasiswa['fakultas'];
                        ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$nim?></td>
                            <td><?=$nama?></td>
                            <td><?=$alamat?></td>
                            <td><?=$fakultas?></td>
                        </tr>
                        <?php
                            $no++;
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="datatables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>