<?php 
// File ini berfungsi untuk membuat database dan table jika tidak ada dan menghubungkan ke database 
$servername = "localhost";
$database = "talkativeu_db";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {}
$sql = "CREATE DATABASE IF NOT EXISTS $database";
$conn->query($sql);

$conn->close();

//create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {}

$sql = "CREATE TABLE IF NOT EXISTS `murid` (
    `id` int(5) NOT NULL AUTO_INCREMENT,
    `nama` varchar(25) DEFAULT NULL,
    `kelas` varchar(1) DEFAULT NULL,
    `alamat` varchar(50) DEFAULT NULL,
    `status` varchar(225) DEFAULT NULL,
    PRIMARY KEY (`id`))";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS `users` (
    `email` varchar(255) NOT NULL,
    `pass` varchar(255) NOT NULL,
    PRIMARY KEY (`email`))";
$conn->query($sql);
?>