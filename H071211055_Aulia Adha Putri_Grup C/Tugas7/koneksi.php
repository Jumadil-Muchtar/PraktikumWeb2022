<?php
session_start();

class Connection
{
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $db = "mahasiswa";
    public $port = "3307";
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db, $this->port);
    }

    public function getConn(){
        return $this->conn;
    }
}

class Auth extends Connection{

    public function registration($username, $email, $password, $cpassword)
    {

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($this->conn, $sql);

        if ($result->num_rows > 0) {
            return 1;
            //email sdh ada

        } else {
            if ($password == $cpassword) {
                $sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
                $result = mysqli_query($this->conn, $sql);
                return 2;
                //sukses
            } else {
                return 3;
                //pass salah
            }
        }
    }
    public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($result->num_rows > 0) {

            if ($password == $row["password"]) {
                $this->id = $row["id"];

                $_SESSION['username'] = $row['username'];
                // session = menyimpan informasi sebagai pengenal siapa yang login
                $res = array("id" =>1, "data"=>$row);
                return $res;
                //sukses
            }
        } else {
            $res = array("id" => 2, "data" => null);
            return $res;
            //pass salah
        }
    }
    public function idUser()
    {
        return $this->id;
    }
    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: login.php");
    }

}

class Data extends Connection
{
    public $nim        = "";
    public $nama       = "";
    public $alamat     = "";
    public $fakultas   = "";
    public $sukses     = "";
    public $error      = "";
    public $id         = "";

    public function insert(){
        $nim        = $_POST['nim'];
        $nama       = $_POST['nama'];
        $alamat     = $_POST['alamat'];
        $fakultas   = $_POST['fakultas'];

        $result = mysqli_query($this->conn, "select * from mahasiswa where nim = '$nim'");
        $num_rows = mysqli_num_rows($result);
        if ($num_rows) {
            return false;
        } else {
            $sql1   = "insert into mahasiswa(nim,nama,alamat,fakultas) values ('$nim','$nama','$alamat','$fakultas')";
            $q1     = mysqli_query($this->conn, $sql1);
            if ($q1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function delete($id){
      
        $sql1       = "delete from mahasiswa where id = '$id'";
        $q1         = mysqli_query($this->conn, $sql1);
        if ($q1) {
            
            return true;
        } else {
            return false;
        }
    }

    public function edit($id){
        $sql1       = "select * from mahasiswa where id = '$id'";
        $q1         = mysqli_query($this->conn, $sql1);
        $r1         = mysqli_fetch_assoc($q1);
         return $r1;
       
    }

    public function update($id, $nim, $nama, $alamat, $fakultas) {
        $sql1       = "update mahasiswa set nim = '$nim',nama='$nama',alamat = '$alamat',fakultas='$fakultas' where id = '$id'";
        $q1         = mysqli_query($this->conn, $sql1);
        if ($q1) {
            return true;
        } else {
            return  false;
        }
    }

    public function tampil(){
            $isi = null;
        $sql2   = "select * from mahasiswa order by id asc";
        if ($q2  = $this->conn->query($sql2)) {
            while ($row = mysqli_fetch_assoc($q2)) {
                $isi[] = $row;
            }
        }
        return $isi;
    }
}