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
$sql = "DELETE FROM mahasiswa WHERE nim = '$nim'";
$conn->query($sql);

$conn->close();
?>