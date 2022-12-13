<?php
class user {
    public $email;
    public $username;
    
    function select(mysqli $conn) {
        $data = [];
        if (!empty($_POST)) {
        $order = $_POST["order"];
        $sql = "SELECT * FROM mahasiswa ORDER BY $order";
        } else {
        $sql = "SELECT * FROM mahasiswa";
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
        }
        $dataJson = json_encode($data);
        echo $dataJson;
    }
}

class admin extends user {
    function delete(mysqli $conn) {
        $nim = $_POST["nim"];
        $sql = "DELETE FROM mahasiswa WHERE nim = '$nim'";
        $conn->query($sql);
    }
    
    function edit(mysqli $conn) {
        $nim = $_POST["nim"];
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $fakultas = $_POST["fakultas"];
        $sql = "UPDATE mahasiswa SET nama = '$nama', alamat = '$alamat', fakultas = '$fakultas' WHERE nim = '$nim'";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    function insert(mysqli $conn) {
        $nim = $_POST["nim"];
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $fakultas = $_POST["fakultas"];
        
        $sql = "INSERT INTO mahasiswa (nim,nama,alamat,fakultas) VALUES('$nim','$nama','$alamat','$fakultas')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "praktikum_pemrograman_web";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['users'])) {
    echo 'No Session';
    die();
} else {
    if($_SESSION['users'] == 'member') {
        $user = new user();
    } elseif ($_SESSION['users'] == 'admin') {
        $user = new admin();
    } else {
        echo 'No Session';
    }
}