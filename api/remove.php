<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prtk_06";
$port = 3307;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$nim = $_POST["nim"];
$sql = "DELETE FROM Mahasiswa WHERE nim = '$nim'";
$conn->query($sql);

$conn->close();
?>