<?php
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

$conn->close();
?>