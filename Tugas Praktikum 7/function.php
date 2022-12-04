<?php

require 'connectdb.php';

function daftar($post) {
    global $conn;
    $nama       = strip_tags($post['nama']);
    $email      = strip_tags($post['email']);
    $username   = strip_tags($post['username']);
    $password   = strip_tags($post['password']);
    $role       = strip_tags($post['role']);
    // Enkripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO `users` (`nama`, `email`, `username`, `password`, `role`) VALUES ('$nama', '$email', '$username', '$password', '$role')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function login($post){
    global $conn;
    $username = mysqli_real_escape_string($conn, $post["username"]);
    $password = mysqli_real_escape_string($conn, $post["password"]);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($result) == 1) {
        $hasil = mysqli_fetch_assoc($result);
        if (password_verify($password, $hasil["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["nama"] = $hasil["nama"];
            $_SESSION["email"] = $hasil["email"];
            $_SESSION["username"] = $hasil["username"];
            $_SESSION["password"] = $hasil["password"];
            $_SESSION["role"] = $hasil["role"];
            if($_SESSION["role"] == 'admin') {
                header("location:index.php");
            } else if ($_SESSION["role"] == 'mahasiswa'){
                header("location:indexmhs.php");
            }
            exit;
        } else {
            header("location:login.php?pesan=salah");
            exit;
        }
    } else {
        header("location:login.php?pesan=salah");
        exit;
    }
}

function logout(){
    session_unset();
    session_destroy();
    header("location:login.php");
}

class Akun {
    // Variabel
    private $nama;
    private $email;
    private $username;
    private $password;
    private $role;
    // Constructor
    function __construct ($nama, $email, $username, $password, $role){
        $this->nama = $nama;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }
    // Method get variabel
    public function get_name(){
        return $this->nama;
    }
    public function get_email(){
        return $this->email;
    }
    public function get_username(){
        return $this->username;
    }
    public function get_password(){
        return $this->password;
    }
    public function get_role(){
        return $this->role;
    }
}

interface Fungsi {
    public function input_data($post);
    public function update_data($post);
    public function daftar($post);
}

class Admin extends Akun implements Fungsi {
    public function daftar($post) {
        global $conn;
        $nama       = strip_tags($post['nama']);
        $email      = strip_tags($post['email']);
        $username   = strip_tags($post['username']);
        $password   = strip_tags($post['password']);
        $role       = strip_tags($post['role']);
        // Enkripsi Password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO `users` (`nama`, `email`, `username`, `password`, `role`) VALUES ('$nama', '$email', '$username', '$password', '$role')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    public function input_data($post){
        global $conn;
        $nim = $post['nim']; 
        $nama = $post['nama'];
        $alamat = $post['alamat'];
        $fakultas = $post['fakultas'];
        $get = mysqli_query($conn, "SELECT * FROM mahasiswa");
        $get_array_nim = mysqli_query($conn, "SELECT NIM FROM mahasiswa");
        $array_nim = mysqli_fetch_array($get_array_nim);
        if(empty($array_nim)){
            $array_nim = [];
        }
        $array = mysqli_fetch_array($get);
        $cekmahasiswa = in_array($nim, $array_nim);
        $query = "INSERT INTO mahasiswa (nim,nama,alamat,fakultas) VALUES ('$nim','$nama','$alamat','$fakultas')";
        if(!$cekmahasiswa){
            mysqli_query($conn, $query);
            header("location:index.php?pesan=input");
        } else {
            header("location:index.php?pesan=duplikat");
        }
    }
    public function update_data($post){
        global $conn;
        $id = $post['id'];
        $namaBaru = $post['nama_baru'];
        $alamatBaru = $post['alamat_baru'];
        $fakultasBaru = $post['fakultas_baru'];
        $sql = mysqli_query($conn, "UPDATE mahasiswa SET nama = '$namaBaru', alamat = '$alamatBaru', fakultas = '$fakultasBaru' WHERE nim = '$id'");
        
        if($sql){
            header("location:index.php?pesan=update");
        } else {
            die(mysqli_error($conn));
        }
    }
}

class Mahasiswa extends Akun implements Fungsi {
    public function daftar($post) {
        // Mahasiswa tidak dapat daftar akun
    }
    public function input_data($post){
        // Mahasiswa tidak dapat menginput data
    }
    public function update_data($post){
         // Mahasiswa tidak dapat mengedit data       
    }
}

// Input data mahasiswa
// function input_data($post){
    
//     global $conn;

//     $nim = $post['nim']; 
//     $nama = $post['nama'];
//     $alamat = $post['alamat'];
//     $fakultas = $post['fakultas'];
//     $get = mysqli_query($conn, "SELECT * FROM mahasiswa");
//     $get_array_nim = mysqli_query($conn, "SELECT NIM FROM mahasiswa");
//     $array_nim = mysqli_fetch_array($get_array_nim);
//     if(empty($array_nim)){
//         $array_nim = [];
//     }
//     $array = mysqli_fetch_array($get);
//     $cekmahasiswa = in_array($nim, $array_nim);
//     $query = "INSERT INTO mahasiswa (nim,nama,alamat,fakultas) VALUES ('$nim','$nama','$alamat','$fakultas')";
//     if(!$cekmahasiswa){
//         mysqli_query($conn, $query);
//         header("location:index.php?pesan=input");
//     } else {
//         header("location:index.php?pesan=duplikat");
//     }
// }

// Update data mahasiswa
// function update_data($post){
    
//     global $conn;

//     $id = $post['id'];
//     $namaBaru = $post['nama_baru'];
//     $alamatBaru = $post['alamat_baru'];
//     $fakultasBaru = $post['fakultas_baru'];
//     $sql = mysqli_query($conn, "UPDATE mahasiswa SET nama = '$namaBaru', alamat = '$alamatBaru', fakultas = '$fakultasBaru' WHERE nim = '$id'");
    
//     if($sql){
//         header("location:index.php?pesan=update");
//     } else {
//         die(mysqli_error($conn));
//     }
// }

// Fungsi Login
// function login($post){

//     global $conn;
    
//     $username = mysqli_real_escape_string($conn, $post["username"]);
//     $password = mysqli_real_escape_string($conn, $post["password"]);

//     $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

//     if (mysqli_num_rows($result) == 1) {
//         $hasil = mysqli_fetch_assoc($result);
//         if (password_verify($password, $hasil["password"])) {
//             $_SESSION["login"] = true;
//             $_SESSION["nama"] = $hasil["nama"];
//             $_SESSION["email"] = $hasil["email"];
//             $_SESSION["username"] = $hasil["username"];
//             $_SESSION["password"] = $hasil["password"];
//             $_SESSION["role"] = $hasil["role"];

//             header("location:index.php");
//             exit;
//         } else {
//             header("location:login.php?pesan=salah");
//             exit;
//         }
//     } else {
//         header("location:login.php?pesan=salah");
//         exit;
//     }
// }

// Fungsi Daftar
// function daftar($post) {

//     global $conn;

//     $nama       = strip_tags($post['nama']);
//     $email      = strip_tags($post['email']);
//     $username   = strip_tags($post['username']);
//     $password   = strip_tags($post['password']);
//     $role       = strip_tags($post['role']);

//     // Enkripsi Password
//     $password = password_hash($password, PASSWORD_DEFAULT);

//     $query = "INSERT INTO `users` (`nama`, `email`, `username`, `password`, `role`) VALUES ('$nama', '$email', '$username', '$password', '$role')";
    
//     mysqli_query($conn, $query);

//     return mysqli_affected_rows($conn);

// }

// Fungsi Logout
// function logout(){

//     session_unset();
//     session_destroy();
//     header("location:login.php");

// }

// Query Function
function select($query){

    global $conn;

    $get = mysqli_query($conn, $query);
    $baris = [];

    while ($row = mysqli_fetch_array($get)){
        $baris[] = $row;
    }

    return $baris;

}

?>