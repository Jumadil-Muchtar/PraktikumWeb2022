<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS praktikum_pemrograman_web";

if ($conn->query($sql) === TRUE) {
    // echo "New database created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
// -------------------------------------------------------------------- //
$database = "praktikum_pemrograman_web";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$table = "CREATE TABLE IF NOT EXISTS mahasiswa (
	nim VARCHAR(11) NOT NULL PRIMARY KEY,
	nama VARCHAR(255) NOT NULL,
	alamat VARCHAR(255),
	fakultas VARCHAR(255)
)";
if ($conn->query($table) === TRUE) {
    // echo "New table created successfully";
} else {
    echo "Error: " . $table . "<br>" . $conn->error;
}

$conn->close();
?>