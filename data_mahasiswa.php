<?php
require 'koneksi.php';

$data = new Data();
$Auth = new Auth();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$name        = "";
$nim         = "";
$address     = "";
$faculty     = "";
$activity    = "";
$success     = "";
$error       = "";
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
        $success = "Berhasil menghapus data ";
    } else {
        $error   = "Gagal melakukan delete data";
    }
}
if ($op == 'logout') {
    $Auth->logout();
}
if ($op == 'edit') {

    $id         = $_GET['id'];
    $r1 = $data->edit($id);

    $name        = $r1['name'];
    $nim         = $r1['nim'];
    $address     = $r1['address'];
    $faculty     = $r1['faculty'];
    $acticvity   = $r1['activity'];
    if ($name == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) {
    $name        = $_POST['name'];
    $nim         = $_POST['nim'];
    $address     = $_POST['address'];
    $faculty     = $_POST['faculty'];
    $acticvity   = $_POST['activity'];
    if ($name && $nim && $address && $faculty) {
        if ($op == 'edit') { //update

            $q1 = $data->update($id, $name, $nim, $address, $faculty, $acticvity);
            if ($q1 == true) {
                $success = "Berhasil mengupdate data ";
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
                    $success     = "Berhasil memasukkan data ";
                }
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}