<?php
session_start();

class Connection
{
    public $username = "localhost";
    public $servername = "root";
    public $password = "";
    public $dbname = "data_mahasiswa";
    public $port = 3307;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->username, $this->servername, $this->password, $this->dbname);
    }

    public function getConn(){
        return $this->conn;
    }
}

class Auth extends Connection{

    public function registration($username, $email, $password, $confirmpassword)
    {

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($this->conn, $sql);

        if ($result->num_rows > 0) {
            return 1;
            //email sdh ada

        } else {
            if ($password == $confirmpassword) {
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
    public $activity    = "";
    public $success     = "";
    public $error       = "";
    public $id          = "";

    public function insert(){
        $name        = $_POST['name'];
        $nim         = $_POST['nim'];
        $address     = $_POST['address'];
        $faculty     = $_POST['faculty'];
        $activity    = $_POST['activity'];

        $result = mysqli_query($this->conn, "select * from data_mahasiswa where name = '$name'");
        $num_rows = mysqli_num_rows($result);
        if ($num_rows) {
            return false;
        } else {
            $sql1   = "insert into data_mahasiswa(name,nim,address,faculty) values ('$name','$nim','$address','$faculty','$activity')";
            $q1     = mysqli_query($this->conn, $sql1);
            if ($q1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function delete($id){
      
        $sql1       = "delete from data_mahasiswa where id = '$id'";
        $q1         = mysqli_query($this->conn, $sql1);
        if ($q1) {
            
            return true;
        } else {
            return false;
        }
    }

    public function edit($id){
        $sql1       = "select * from data_mahasiswa where id = '$id'";
        $q1         = mysqli_query($this->conn, $sql1);
        $r1         = mysqli_fetch_assoc($q1);
         return $r1;
       
    }

    public function update($id, $name, $nim, $address, $faculty, $activity) {
        $sql1       = "update data_mahasiswa set name = '$name',nim='$nim',address = '$address',faculty='$faculty',activity='$activity', where id = '$id'";
        $q1         = mysqli_query($this->conn, $sql1);
        if ($q1) {
            return true;
        } else {
            return  false;
        }
    }

    public function tampil(){
            $isi = null;
        $sql2   = "select * from data_mahasiswa order by id asc";
        if ($q2  = $this->conn->query($sql2)) {
            while ($row = mysqli_fetch_assoc($q2)) {
                $isi[] = $row;
            }
        }
        return $isi;
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
</head>
<body>
    
</body>
</html>