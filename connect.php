<?php

session_start();

class Connection{

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";
$port = 3307;

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
                //success
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
                //success
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
    public $name        = "";
    public $nim         = "";
    public $address     = "";
    public $faculty     = "";
    public $success     = "";
    public $error       = "";
    public $id          = "";

    public function insert(){
        $name           = $_POST['name'];
        $nim            = $_POST['nim'];
        $address        = $_POST['address'];
        $faculty        = $_POST['faculty'];

        $result = mysqli_query($this->conn, "select * from mahasiswa where name = '$name'");
        $num_rows = mysqli_num_rows($result);
        if ($num_rows) {
            return false;
        } else {
            $sql1   = "insert into mahasiswa(name,nim,address,faculty) values ('$name','$nim','$address','$faculty')";
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

    public function update($id, $name, $nim, $address, $faculty) {
        $sql1       = "update mahasiswa set name = '$name',nim='$nim',address = '$address',faculty='$faculty' where id = '$id'";
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