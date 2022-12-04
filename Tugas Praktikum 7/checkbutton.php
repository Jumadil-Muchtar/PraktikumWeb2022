<?php

// Login
if(isset($_POST['login'])) {
    login($_POST);
}

// Daftar
if(isset($_POST['registerindex'])) {
    if(daftar($_POST) > 0) {
        header("location:index.php?pesan=berhasilbuat");
    } else {
        header("location:index.php?pesan=gagalbuat");
    }
}
if(isset($_POST['register'])) {
    if(daftar($_POST) > 0) {
        header("location:login.php?pesan=berhasilbuat");
    } else {
        header("location:login.php?pesan=gagalbuat");
    }
}

global $role;

// Input data
if(isset($_POST['inputdata'])){
    if ($_SESSION["role"] == "admin") {
        $admin = new Admin($_SESSION["nama"], $_SESSION["email"], $_SESSION["username"], $_SESSION["password"], $_SESSION["role"]);
        $admin->input_data($_POST);
    } else if ($_SESSION["role"] == "mahasiswa") {
        $mahasiswa = new Mahasiswa($_SESSION["nama"], $_SESSION["email"], $_SESSION["username"], $_SESSION["password"], $_SESSION["role"]);
        $mahasiswa->input_data($_POST);
    }
}

// Update data
if(isset($_POST["updatedata"])) {
    if ($_SESSION["role"] == "admin") {
        $admin = new Admin($_SESSION["nama"], $_SESSION["email"], $_SESSION["username"], $_SESSION["password"], $_SESSION["role"]);
        $admin->update_data($_POST);
    } else if ($_SESSION["role"] == "mahasiswa") {
        $mahasiswa = new Mahasiswa($_SESSION["nama"], $_SESSION["email"], $_SESSION["username"], $_SESSION["password"], $_SESSION["role"]);
        $mahasiswa->update_data($_POST);
    }
}

// Logout
if(isset($_POST["logout"])) {
    $_SESSION = [];
    logout();
}

?>