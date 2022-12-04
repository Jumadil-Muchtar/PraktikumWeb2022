<?php
    require 'connectdb.php';

// Input data mahasiswa
if(isset($_POST['inputdata'])){
    //Inisiasi variabel
    $nim = $_POST['nim']; 
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $fakultas = $_POST['fakultas'];
    $get = mysqli_query($conn, "SELECT * FROM mahasiswa");
    $get_array_nim = mysqli_query($conn, "SELECT NIM FROM mahasiswa");
    $array_nim = mysqli_fetch_array($get_array_nim);
    $array = mysqli_fetch_array($get);
    $cekmahasiswa = in_array($nim, $array_nim);
    if(empty($nim) || empty($nama) || empty($alamat) || empty($fakultas)){
        echo '<script>alert("Ada data yang kosong!");</script>';
    } else {
        if($cekmahasiswa){
            echo '<script>alert("Data duplikat, silahkan mengisi data dengan benar!");</script>';
        } else {
            mysqli_query($conn, "INSERT INTO mahasiswa (nim,nama,alamat,fakultas) VALUES ('$nim','$nama','$alamat','$fakultas')");
            echo '<script>alert("Data telah diinput");</script>';
            header("location:index.php?pesan=input");
        }
    }
}

function update($id){
    include 'connectdb.php';
    // Update data mahasiswa
    if(isset($_POST['updatedata'])){
        //Inisiasi variabel
        $nimbBaru = $_POST['nim_baru']; 
        $namaBaru = $_POST['nama_baru'];
        $alamatBaru = $_POST['alamat_baru'];
        $fakultasBaru = $_POST['fakultas_baru'];
        $getBaru = mysqli_query($conn, "SELECT * FROM mahasiswa");
        $get_array_nimBaru = mysqli_query($conn, "SELECT NIM FROM mahasiswa");
        $array_nimBaru = mysqli_fetch_array($get_array_nimBaru);
        $arrayBaru = mysqli_fetch_array($getBaru);
        $sql = mysqli_query($conn, "UPDATE mahasiswa SET nim = '$nimbBaru', nama = '$namaBaru', alamat = '$alamatBaru', fakultas = '$fakultasBaru' WHERE nim = '$id'");
        if($sql){
            header("location:index.php?pesan=update");
        } else {
            die(mysqli_error($conn));
        }
    }
}

// // Update data mahasiswa
// if(isset($_POST['updatedata'])){
//     //Inisiasi variabel
//     $nim = $_POST['nim_baru']; 
//     $nama = $_POST['nama_baru'];
//     $alamat = $_POST['alamat_baru'];
//     $fakultas = $_POST['fakultas_baru'];
//     $get = mysqli_query($conn, "SELECT * FROM mahasiswa");
//     $get_array_nim = mysqli_query($conn, "SELECT NIM FROM mahasiswa");
//     $array_nim = mysqli_fetch_array($get_array_nim);
//     $array = mysqli_fetch_array($get);
//     if(empty($nim) || empty($nama) || empty($alamat) || empty($fakultas)){
//         echo '<script>alert("Ada data yang kosong!");</script>';
//     } else {
//         $sql = mysqli_query($conn, "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', alamat = '$alamat', fakultas = '$fakultas' WHERE nim = '$nim'");
//         if($sql){
//             header("location:index.php?pesan=update");
//         } else {
//             die(mysqli_error($conn));
//         }
//     }
// }